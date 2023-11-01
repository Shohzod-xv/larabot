<?php

namespace App\Traits;

use App\Models\Bot;
use Illuminate\Http\Request;

trait RequestTrait
{
    private function apiRequest($key,$method, $parameters = [])
    {
        $bot = Bot::query()->where('key', $key)->first();
        $url = "https://api.telegram.org/bot". $bot->token . "/" . $method;
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
