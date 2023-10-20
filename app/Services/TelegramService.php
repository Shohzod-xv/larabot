<?php

namespace App\Services;


use Illuminate\Support\Facades\Http;

class TelegramService{
    protected $token;
    public function __construct()
    {
        $this->token = env("TOKEN");
    }

    public function execute($method, $params = [])
    {
        $url = printf('https://api.telegram.org/bot%s/%s', $this->token, $method);
        $request = Http::post($url, $params);
        return $request->json('result', []);
    }

    public function getUpdates(int $offset)
    {
        $response = $this->execute('getUpdates', [
            'offset' => 0
        ]);
        return $response;
    }

    public function sendMessage(string $chatId, string $text)
    {
        $response = $this->execute('sendMessage', [
            'chat_id' => $chatId,
            'text' => $text
        ]);
        return $response;
    }

}
