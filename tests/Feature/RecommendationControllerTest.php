<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use App\Services\RecommendationService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use App\Http\Controllers\RecommendationController;

class RecommendationControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_gets_recommended_books()
    {
        $user = User::factory()->create();

        $mock = Mockery::mock(RecommendationService::class);
        $mock->shouldReceive('getRecommendedBooks')->once()->andReturn(['book1', 'book2']);

        $this->app->instance(RecommendationService::class, $mock);

        $this->actingAs($user, 'api');
        $response = $this->getJson('/api/get-recommended-books');

        $this->actingAs($user, 'api');
        $response->assertStatus(200);
        $response->assertJson(['book1', 'book2']);
    }

    protected function tearDown(): void
    {
        Mockery::close();
        parent::tearDown();
    }
}
