<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\User;
use App\Models\BorrowItem;
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
            'borrower_id' => User::factory()->peminjam()->create(),
            'operator_id' => User::factory()->operator()->create(),
            'status' => $this->faker->randomElement(['processed', 'approved', 'rejected', 'returned']),
            'item_id' => Item::factory(),
            'quantity' => rand(1, 5),
            'request_date' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'return_date' => $this->faker->dateTimeBetween('now', '+1 week'),
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function ($borrowRequest) {
            BorrowItem::factory()
                ->count(rand(2, 5))
                ->create([
                    'borrow_request_id' => $borrowRequest->id,
                ]);
        });
    }
}
