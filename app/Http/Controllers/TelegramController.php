<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;

class TelegramController extends Controller
{
    public $chat_id, $text;

    public function __construct()
    {
        $update = json_decode(file_get_contents('php://input'));
        $message = $update->message;
        $this->chat_id = $message->chat->id;
        $this->text = $message->text;
    }

    public function bot($method, $data = [])
    {
        $url = "https://api.telegram.org/bot5939347329:AAH5el7Gry0CMTpnIReGzM04yFF6TU45ADY/".$method;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $res = curl_exec($ch);
        if (curl_error($ch)) {
            return curl_error($ch);
        } else {
            return json_decode($res);
        }
    }

    public function index(Request $request)
    {
        dd($request);
//        if ($this->text == "/start"){
//            return $this->bot('sendMessage', [
//                'chat_id' => $this->chat_id,
//                'text' => "Assalomu alekum"
//            ]);
//        }
    }
}
