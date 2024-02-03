<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Book;
use App\Services\SMSService;
use Illuminate\Support\Facades\Http;

class ReadingIntervalControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_submits_reading_interval_and_sends_thank_you_sms()
    {
        $user = User::factory()->create();
        $book = Book::factory()->create();

        $data = [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'start_page' => 1,
            'end_page' => 100,
        ];

        $this->mock(SMSService::class, function ($mock) use ($user) {
            $mock->shouldReceive('sendThankYouSMS')
                ->once()
                ->with($user->id)
                ->andReturn(true);
        });

        $this->actingAs($user, 'api');

        $response = $this->postJson('/api/submit-reading-interval', $data);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Reading interval submitted successfully']);

        $this->assertDatabaseHas('reading_intervals', $data);
    }
}
