<?php

namespace Database\Factories;

use App\Models\ReadingInterval;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReadingIntervalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ReadingInterval::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'book_id' => \App\Models\Book::factory(),
            'start_page' => $this->faker->numberBetween(1, 100),
            'end_page' => $this->faker->numberBetween(101, 200),
        ];
    }
}
