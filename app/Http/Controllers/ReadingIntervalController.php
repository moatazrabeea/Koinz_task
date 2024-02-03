<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubmitReadingIntervalRequest;
use App\Models\ReadingInterval;
use App\Services\SMSService;
use Illuminate\Http\Request;

class ReadingIntervalController extends Controller
{
    protected $smsService;
    public function __construct(SMSService $smsService)
    {
        $this->smsService = $smsService;
    }

    public function submitReadingInterval(SubmitReadingIntervalRequest $request)
    {


        $readingInterval = ReadingInterval::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'start_page' => $request->start_page,
            'end_page' => $request->end_page,
        ]);

        // Send SMS
        $this->smsService->sendThankYouSMS($request->user_id);

        return response()->json(['message' => 'Reading interval submitted successfully']);
    }
}
