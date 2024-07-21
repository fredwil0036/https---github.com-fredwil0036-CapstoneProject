<?php

namespace App\Services;

use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class SmsService
{

    protected $apiUrl;
    protected $apiKey;

    public function __construct()
    {
        $this->apiUrl = config('philsim.api_url');
        $this->apiKey = config('philsim.api_key');

        Log::info('PHILSIM API URL: ' . $this->apiUrl);
        Log::info('PHILSIM API Key: ' . $this->apiKey);
    }

    public function sendSms($recipient, $message, $senderId = 'YourName', $type = 'plain')
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->apiKey,
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
        ])->post($this->apiUrl . 'sms/send', [
            'recipient' => $recipient,
            'sender_id' => $senderId,
            'type' => $type,
            'message' => $message,
        ]);

        if ($response->failed()) {
            Log::error('HTTP Error: ' . $response->status() . ' - Response: ' . $response->body());
        } else {
            Log::info('SMS sent successfully: ' . $response->body());
        }

        return $response->json();
    }
}
