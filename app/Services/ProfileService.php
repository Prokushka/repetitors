<?php

namespace App\Services;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class ProfileService
{
    static public function getImage(Request|string $name, ?string $surname = null , string $url = null): string
    {

        if ($name instanceof Request){
            $fullName = $name->first_name . $name->last_name ? "_$name->last_name" : '';
            $fileName =  $fullName . '.' . $name->file('image')->getClientOriginalExtension();
            $exist = Storage::exists('profiles/' . $fileName);
            if ($exist){
                for ($i = 1; $exist; $i++){
                    $exist = Storage::exists('profiles/' . $fullName . '_' . $i  . '.' . $name->file()->getClientOriginalExtension());

                }
                $fileName = $fullName . '_' . $i  . '.' . $name->file('image')->getClientOriginalExtension(); ;
            }
            return Storage::disk('public')->putFileAs('profiles', $name->file('image'), $fileName);
        }
        else {
            $fullName = $name .($surname ? "_$surname" : '');
            $separate = explode('.', $url);
            $extension = strtok(end($separate), '?');
            $fileName =  $fullName . '.'. $extension;
            $exist = Storage::exists('profiles/' . $fileName);
            if ($exist){
                for ($i = 1; $exist; $i++){
                    $exist = Storage::exists('profiles/' . $fullName . '_' . $i  . '.' . $extension);

                }
                $fileName = $fullName . '_' . $i  . '.' . $extension; ;
            }
            return Storage::disk('public')->putFileAs('profiles', $url, $fileName);
        }



    }
   /* public static function parseImage($name, $url)
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
    }*/

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

}
