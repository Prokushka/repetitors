<?php

namespace App\Services;

use App\Jobs\ParsingVk;
use App\Models\Profile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

 class ParseVkService
{


     private static function parse($count, $offset, $domain)
    {


            $response = Http::withoutVerifying()->connectTimeout(2)->acceptJson()->get('https://api.vk.com/method/wall.get',[
                'access_token' => config('services.vk.access_token'),
                'domain' => $domain,
                'offset' => $count * $offset,
                'count' => $count,
                'filter' => 'others',
                'extended' => 1,
                'fields' => 'first_name,last_name,sex,photo_max',
                'v' => config('services.vk.version'),


            ]);

            return $response['response'] ? $response['response'] : null;




    }

    public static function getFriends(int $count, string $domain)
    {
        static $offset = 0;

        $friends = self::parse($count, $offset, $domain);
        $offset++;


        $text = collect($friends['items']);

        for ($i = 0; $i < count($friends['profiles']); $i++){

            $authorText = $text->where('from_id', $friends['profiles'][$i]['id'])->pluck('text');



            if (
                !Profile::query()->where('vk_id', $friends['items'][$i]['from_id'])->exists() &&
                !empty($friends['items'][$i]['text']
                )){
                $image = ProfileService::parseImage($friends['profiles'][$i]['first_name'] . '_' . $friends['profiles'][$i]['last_name'], $friends['profiles'][$i]['photo_max']);
                Profile::query()->create([
                    'sex' => $friends['profiles'][$i]['sex'],
                    'first_name' => $friends['profiles'][$i]['first_name'],
                    'last_name' => $friends['profiles'][$i]['last_name'],
                    'image' => $image,
                    'description' => $authorText->first(),
                    'user_id' => 1,
                    'vk_id' => $friends['profiles'][$i]['id'],
                ]);
            }
            else{
                dump(1);
            }


        }
        sleep(rand(1,3));
        ParsingVk::dispatch($i, $domain);
    }


}
