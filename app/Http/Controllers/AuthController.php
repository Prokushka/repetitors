<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\JwtTokenService;
use Illuminate\Support\Facades\Log;
use Lcobucci\Clock\SystemClock;
use Lcobucci\JWT\Token\Plain;
use GuzzleHttp\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Lcobucci\JWT\Encoding\JoseEncoder;
use Lcobucci\JWT\Token\Parser;



class AuthController extends Controller
{


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'email|required|string',
            'password' => 'required',
        ]);

        $user = User::query()->where('email', $credentials['email'])->first();

        if (empty($user)) {
            return response()->json(['error' => 'Такого пользователя не существует'], 401);
        }



        $token = (new JwtTokenService())->create($user);
        return response()->json(['access_token' => $token[0]])
            ->cookie('refresh_token', $token[1], 60 * 24, '/', null, true, true);

    }

    public function refresh(Request $request)
    {
        $parser = new Parser(new JoseEncoder());
        if ($request->cookie('refresh_token')){
            return response()->json(['error' => 'refresh_token is null']);
        }

        $refresh = $parser->parse($request->cookie('refresh_token'));



        if ($refresh->isExpired(now()) === false){
            assert($refresh instanceof Plain);
            $user = User::query()->find((int) $refresh->claims()->get('sub'));
            $token = (new JwtTokenService())->refresh($user);

            return response()->json(['access_token' => $token]);
        }
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }


    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'email|required|string|unique:users',
            'password' => 'required|confirmed',
        ]);

        $user = User::query()->create($validated);

        $token = (new JwtTokenService())->create($user);

        response()->json(['access_token' => $token[0]])
            ->cookie('refresh_token', $token[1], 60 * 24, '/', null, true, true);
    }

    /*public function login(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'email' => 'email|required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();
            return redirect()->intended(route('profile.index'))->with('success', 'Вы успешно вошли');
        }
        return redirect()->back()->withErrors([
            'email' => 'Wrong email or password'
        ]);
    }



    public function logout(Request $request): RedirectResponse
    {
        \auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('index');
    }*/


}
