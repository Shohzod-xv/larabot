<?php

namespace App\Http\Controllers;

use App\Traits\MakeComponentsTrait;
use App\Traits\RequestTrait;
use Illuminate\Http\Request;

class TelegramController extends Controller
{
    use RequestTrait;
    use MakeComponentsTrait;

    public function webhook(Request $request): array
    {
        return $this->apiRequest($request,'setWebhook',[
            'url' => url(route('webhook',['key' => "qwerty"]))
        ]) ? ['success'] : ['danger'];
    }

    public function index(Request $request)
    {
        $result = json_decode(file_get_contents('php://input'));
        $action = $result->message->text;
        $userId = $result->message->from->id;

        if ($action == "/start"){
            $this->apiRequest($request,'sendMessage',[
                'chat_id' => $userId,
                'text' => "Assalomu alekum"
            ]);
        }
    }
}


















