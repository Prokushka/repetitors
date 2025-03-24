<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use App\Models\User;
use App\Services\ProfileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Mockery\Exception;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {

        $profiles = Profile::all();
        return view('profile.index', ['profiles' => $profiles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return \view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Profile $profile)
    {


        try {

            $path = ProfileService::getImage($request);
            $profile = ProfileService::createProfile($request, $profile, $path);
            return new ProfileResource(Profile::query()->find($profile->id));
        }catch (Exception $exception){
            return  response()->json(['error' => $exception], 505);
        }




    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Log::channel('stack')->debug($id);
        try {

            $profile = Profile::query()->find($id);
            Log::channel('stack')->debug($profile);
            return new ProfileResource($profile);
        } catch (\Exception $exception){
            return response()->json(['error' => $exception], 403);
        }



    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile): View
    {
        return view('profile.edit', $profile);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile)
    {

        Storage::disk('public')->delete($profile->image);
        $profile->delete();
        return redirect()->route('profile.index')->with('success', 'Successfully Delete');
    }
}
