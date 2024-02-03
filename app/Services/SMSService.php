<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Http;

class SMSService
{
    protected $provider;

    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    public function sendThankYouSMS($userId)
    {
        $user = User::find($userId);
        $data = [
            'to' => $user->phone_number,
            'message' => 'Thank you for using our service!',
        ];
        $response = Http::post($this->provider, $data);

        if ($response->successful()) {

            return response()->json(['message' => 'SMS sent successfully']);
        } else {

            return response()->json(['error' => 'Failed to send SMS'], $response->status());
        }
    }
}
