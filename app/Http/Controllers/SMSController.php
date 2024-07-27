<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Services\SmsService;
use Illuminate\Http\Request;
use Twilio\Rest\Client;

class SMSController extends Controller
{
    protected $smsService;

    public function __construct(SmsService $smsService)
    {
        $this->smsService = $smsService;
    }
    public function sendSms(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'barangays' => 'required|array',
        ]);

        $contacts = Contact::whereIn('barangay', $request->barangays)->get();
        $message = $request->message;

      
        foreach ($contacts as $contact) {
            $response = $this->smsService->sendSms($contact->phone_number, $message);
            $results[] = [
                'contact' => $contact->name,
                'response' => $response,
            ];
        }

        return redirect()->route('admin.dashboard')->with('status', 'SMS sent successfully.');
    }
    
}
