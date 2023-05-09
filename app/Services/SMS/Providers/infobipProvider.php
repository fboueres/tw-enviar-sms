<?php

namespace App\Services\SMS\Providers;

use Illuminate\Support\Facades\Http;
use App\Services\SMS\SmsServiceInterface;

class infobipProvider implements SmsServiceInterface
{
    private $token;
    private $url;

    public function __construct(string $token, string $url)
    {
        $this->token = $token;
        $this->url = $url;
    }

    public function send(string $celNumber, string $message): int
    {
        $response = Http::withHeaders([
            'Authorization' => "App {$this->token}"
        ])->post(
                "{$this->url}/text/advanced",
                [
                    'messages' => [
                        'from' => 'fernandoboueres',
                        'destinations' => [
                            'to' => '55' . $celNumber
                        ],
                        'text' => $message
                    ],
                ]
            );

        return $response->json();
    }
}