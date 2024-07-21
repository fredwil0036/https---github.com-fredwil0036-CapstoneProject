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
        $barangays = $request->input('barangays');
        $message = $request->input('message');
        $contacts = Contact::whereIn('barangay', $barangays)->get();

        foreach ($contacts as $contact) {
            $this->smsService->sendSms($contact->phone_number, $message);
        }

        return redirect()->back()->with('success', 'SMS sent successfully.');
    }
    
}
