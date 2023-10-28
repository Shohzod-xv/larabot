<?php

namespace App\Traits;

use App\Models\User;

trait RequestTrait
{
    private function apiRequest($method, $parameters = [])
    {
        $url = "https://api.telegram.org/bot". env("TELEGRAM_TOKEN") . "/" . $method;
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
