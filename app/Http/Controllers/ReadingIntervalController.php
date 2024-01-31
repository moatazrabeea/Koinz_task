<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReadingIntervalController extends Controller
{
    public function submitReadingInterval(Request $request)
    {
        // Validate request data

        $readingInterval = ReadingInterval::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'start_page' => $request->start_page,
            'end_page' => $request->end_page,
        ]);

        // Send SMS
        $smsProvider = env('SMS_PROVIDER');
        $smsService = new SMSService($smsProvider);
        $smsService->sendThankYouSMS($request->user_id);

        return response()->json(['message' => 'Reading interval submitted successfully']);
    }
}
