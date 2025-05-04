<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => rand(1, 10), 
            'name' => $this->faker->words(3, true), 
            'description' => $this->faker->paragraph(), 
            'quantity' => rand(1, 100), 
            'image' => $this->faker->imageUrl(640, 480, 'technics'),
            'status' => $this->faker->randomElement(['available', 'unavailable']),
        ];
    }
}
