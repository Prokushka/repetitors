<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;

use App\Services\ProfileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;


class HomeController extends Controller
{
    public function vue()
    {

        return view('app');
    }

    public function admin()
    {
        return view('admin');
    }

    public function profile()
    {
        $profile = Profile::all();

        return ProfileResource::collection($profile);
    }
    public function store(\Illuminate\Http\Request $request, Profile $profile): RedirectResponse
    {



        $path = ProfileService::getImage($request);


        ProfileService::createProfile($request, $profile, $path);


        return redirect()->route('profile.index');
    }
}
