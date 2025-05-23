<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BorrowRequest>
 */
class BorrowRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'borrower_id' => User::factory()->peminjam()->create(), // assumes User model used for borrower
            'operator_id' => User::factory()->operator()->create(), // same here, change if using separate models
            'status' => $this->faker->randomElement(['processed', 'approved', 'rejected', 'returned']),
            'request_date' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'return_date' => $this->faker->dateTimeBetween('now', '+1 week'),
        ];
    }
}
