<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Services\JwtTokenService;
use Closure;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Lcobucci\Clock\SystemClock;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Signer\Hmac\Sha256;
use Lcobucci\JWT\Token;
use Lcobucci\JWT\Token\Parser;
use Lcobucci\JWT\Validation\Constraint\IdentifiedBy;
use Lcobucci\JWT\Validation\Constraint\RelatedTo;
use Lcobucci\JWT\Validation\Constraint\SignedWith;
use Lcobucci\JWT\Validation\Constraint\ValidAt;
use Lcobucci\JWT\Validation\RequiredConstraintsViolated;
use Lcobucci\JWT\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Framework\isFalse;

class IsValidTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


                $user = Auth::guard('api')->user();
               // Log::channel('stack')->debug($user);

                if ($user instanceof Authenticatable){
                    return $next($request);
                }
                else{
                    return \response()->json(['error' => $user ?? 'Undefined'], 401);
                }



        /*
        $parser = new Parser(new JoseEncoder());
        if ($user == 'Token is expired') {
             $refresh = $parser->parse($request->cookie('refresh_token'));
             if (!$refresh->isExpired(now())){
                 assert($refresh instanceof Token\Plain);
                 $user = User::query()->find((int) $refresh->claims()->get('sub')) ;
                 $token = (new JwtTokenService())->create($user);
             }
         }*/






    }

}
