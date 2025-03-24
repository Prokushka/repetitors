<?php

namespace App\Services\Auth;

use App\Services\JwtTokenService;
use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Token\Plain;
use Lcobucci\JWT\Token\Parser;
use Lcobucci\JWT\Validation\Constraint\SignedWith;
use Lcobucci\JWT\Validation\Constraint\ValidAt;
use Lcobucci\JWT\Validation\RequiredConstraintsViolated;
use Lcobucci\Clock\SystemClock;
use function Pest\Laravel\forgetMock;

class JWTGuard implements Guard
{
    use GuardHelpers;

    /**
     * @inheritDoc
     */

    public function __construct( protected $provider)
    {

    }
    public function check()
    {
        return $this->user() !== null;
    }

    /**
     * @inheritDoc
     */
    public function guest()
    {
        return !$this->check();
    }

    /**
     * @inheritDoc
     */
    public function user(): Authenticatable|string|null
    {
        if ($this->user) {
            return $this->user;
        }
        $parser = new Parser(new JoseEncoder());
        $token = $this->getTokenFromRequest();


        if (!$token) {
            return null;
        }
        $token = $parser->parse($token);

            try {

                $configuration = Configuration::forSymmetricSigner(
                    new Sha256(),
                    InMemory::base64Encoded(config('jwt.secret'))
                );
                $configuration->setValidationConstraints(
                    new SignedWith($configuration->signer(), $configuration->signingKey()),
                    new ValidAt(SystemClock::fromUTC())
                );
                $configuration->validator()->assert($token, ...$configuration->validationConstraints());
            }catch (RequiredConstraintsViolated $e){
                    foreach ($e->violations() as $violation){

                        return  $violation->getMessage();
                    }
            }
            assert($token instanceof Plain);


            $userId = intval($token->claims()->get('sub'));
            $this->user = $this->getProvider()->retrieveById($userId);

            return $this->user;

    }





    /**
     * @inheritDoc
     */
    public function id()
    {
        if ($this->user()) {
            return $this->user()->getAuthIdentifier();
        }

    }

    /**
     * @inheritDoc
     */
    public function validate(array $credentials = [])
    {

    }

    /**
     * @inheritDoc
     */
    public function hasUser()
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function setUser(Authenticatable $user)
    {
        return false;
    }
    protected function getTokenFromRequest()
    {
        $token = request()->bearerToken();

        if (!$token) {
            $token = request()->header('Authorization');
        }

        return $token;
    }


}
