<?php

namespace App\Services;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class ProfileService
{
    static public function getImage(Request $request): string
    {
        $clearName = strtr(strtolower($request->name) , [" " => "_"]);

        $fileName =  $clearName . '.' . $request->file('image')->getClientOriginalExtension();
        $exist = Storage::exists('profiles/' . $fileName);
        if ($exist){
            for ($i = 1; $exist; $i++){
                $exist = Storage::exists('profiles/' . $clearName . '_' . $i  . '.' . $request->file()->getClientOriginalExtension());

            }
            $fileName = $clearName . '_' . $i  . '.' . $request->file('image')->getClientOriginalExtension(); ;
        }



        return Storage::disk('public')->putFileAs('profiles', $request->file('image'), $fileName);

    }

    static public function createProfile(Request $request, Profile $profile, $path)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'image' => 'required',
            'description' => 'string|required'
        ]);

        return $profile->create([
            'name' => $validate['name'],
            'description' => $validate['description'],
            'image' => $path,
            'user_id' => \auth()->id()
        ]);
    }
    public static function parseImage($name, $url)
    {
        $separate = explode('.', $url);
        $extension = strtok(end($separate), '?');
        $fileName =  $name . '.'. $extension;
        $exist = Storage::exists('profiles/' . $fileName);
        if ($exist){
            for ($i = 1; $exist; $i++){
                $exist = Storage::exists('profiles/' . $fileName . '_' . $i  . '.' . $extension);

            }
            $fileName = $fileName . '_' . $i  . '.' . $extension; ;
        }
        return Storage::disk('public')->putFileAs('profiles', $url, $fileName);
    }
}
