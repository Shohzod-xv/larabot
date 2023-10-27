<?php

namespace App\Http\Controllers;

use App\Traits\MakeComponentsTrait;
use App\Traits\RequestTrait;

class TelegramController extends Controller
{
    use RequestTrait;
    use MakeComponentsTrait;

    public function webhook(): array
    {
//        $this->apiRequest('setWebhook',
//            [
//                'url' => url(route('webhook'))
//            ]
//        );
        dd(url(route('webhook')));
    }

    public function index()
    {
        $result = json_decode(file_get_contents('php://input'));
        $action = $result->message->text;
        $userId = $result->message->from->id;

        if ($action == "/start"){
            $text = "Assalomu alekum";
            $this->apiRequest('sendMessage',[
                'chat_id' => $userId,
                'text' => $text
            ]);
        }
    }
}


















