<?php

namespace App\Http\Controllers;
class TelegramController extends Controller
{
    public $chat_id, $text;
    public function __construct()
    {
        $update = json_decode(file_get_contents('php://input'));
        $message = $update->message;
        $this->chat_id = $message->chat->id;
    }

    public function bot($method, $data = [])
    {
        $url = "https://api.telegram.org/bot5939347329:AAH5el7Gry0CMTpnIReGzM04yFF6TU45ADY/".$method;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $res = curl_exec($ch);
        if (curl_error($ch)) {
            var_dump(curl_error($ch));
        } else {
            return json_decode($res);
        }
        curl_close($ch);
    }

    public function index()
    {
        if ($this->text == "/start"){
            return $this->bot('sendMessage', [
                'chat_id' => $this->chat_id,
                'text' => "Assalomu alekum"
            ]);
        }
    }
}
