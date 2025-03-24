<?php

namespace App\Services;

use App\Models\User;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Encoding\ChainedFormatter;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Signer\Key\InMemory;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Token\Builder;
use Lcobucci\JWT\Token\Parser;
use Lcobucci\Clock\SystemClock;
use Lcobucci\JWT\Validation\Constraint\IdentifiedBy;
use Lcobucci\JWT\Validation\Constraint\PermittedFor;
use Lcobucci\JWT\Validation\Constraint\IssuedBy;
use Lcobucci\JWT\Validation\Constraint\RelatedTo;
use Lcobucci\JWT\Validation\Constraint\SignedWith;
use Lcobucci\JWT\Validation\RequiredConstraintsViolated;

use Lcobucci\JWT\Validation\Validator;
use function Symfony\Component\Translation\t;


class JwtTokenService
{
    public function create(User $user): array
    {
        $tokenBuilder = (new Builder(new JoseEncoder(), ChainedFormatter::default()));
        $algorithm    = new Sha256();
        $signingKey   = InMemory::base64Encoded(config('jwt.secret'));


        $tokenAccess = $tokenBuilder
            ->relatedTo($user->id)
            ->expiresAt(now()->toDateTimeImmutable()->modify('+15 minute'))
            ->issuedAt(now()->toDateTimeImmutable())
            ->withClaim('role', $user->role)
            ->getToken($algorithm, $signingKey);
        $tokenRefresh = $tokenBuilder
            ->relatedTo($user->id)
            ->expiresAt(now()->toDateTimeImmutable()->modify('+1 day'))
            ->getToken($algorithm, $signingKey);


        return [$tokenAccess->toString(), $tokenRefresh->toString()];


    }

    public function refresh(User $user): string
    {

        $tokenBuilder = (new Builder(new JoseEncoder(), ChainedFormatter::default()));
        $algorithm    = new Sha256();
        $signingKey   = InMemory::base64Encoded(config('jwt.secret'));


        $tokenAccess = $tokenBuilder
            ->relatedTo($user->id)
            ->expiresAt(now()->toDateTimeImmutable()->modify('+15 minute'))
            ->issuedAt(now()->toDateTimeImmutable())
            ->withClaim('role', $user->role)
            ->getToken($algorithm, $signingKey);

        return $tokenAccess->toString();
    }


}
