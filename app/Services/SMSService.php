<?php

namespace App\Services;

class SMSService
{
    protected $provider;

    public function __construct($provider)
    {
        $this->provider = $provider;
    }

    public function sendThankYouSMS($userId)
    {
        // Logic to send SMS
    }
}
