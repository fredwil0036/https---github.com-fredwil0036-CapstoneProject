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

    public function sendSms($recipient, $message, $senderId = 'PhilSMS', $type = 'plain')
    {
         // Ensure the recipient number is in the correct format
         if (substr($recipient, 0, 1) === '0') {
            $recipient = '63' . substr($recipient, 1);
        } elseif (substr($recipient, 0, 3) === '+63') {
            $recipient = substr($recipient, 1);
        }

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
            return ['status' => 'error', 'message' => 'Failed to send SMS. Check the logs for details.'];
        }

        $responseBody = $response->json();

        if (isset($responseBody['status']) && $responseBody['status'] === 'error') {
            Log::error('SMS Error: ' . $responseBody['message']);
            return ['status' => 'error', 'message' => $responseBody['message']];
        }

        Log::info('SMS sent successfully: ' . json_encode($responseBody));
        return $responseBody;
    }
}
