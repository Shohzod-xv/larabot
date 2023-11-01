<?php

namespace App\Traits;

use App\Models\Bot;
use Illuminate\Http\Request;

trait RequestTrait
{

    public function __construct(protected Request $request)
    {
    }

    private function apiRequest($method, $parameters = [])
    {
        $key = Request::route('key');
        dd($key);
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
