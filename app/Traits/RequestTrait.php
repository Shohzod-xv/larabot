<?php

namespace App\Traits;

use App\Models\Bot;
use App\Models\User;

trait RequestTrait
{
    private function apiRequest($method, $parameters = [])
    {
//        $bot = Bot::query()->where('key', $key)->first();
        $url = "https://api.telegram.org/bot". "5939347329:AAH5el7Gry0CMTpnIReGzM04yFF6TU45ADY" . "/" . $method;
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch,CURLOPT_POSTFIELDS,$parameters);
        $response = curl_exec($ch);
        if(curl_error($ch)){
            var_dump(curl_error($ch));
        }else{
            return json_decode($response);
        }
    }

}
