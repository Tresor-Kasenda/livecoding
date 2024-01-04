<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory()->create(),
            'name' => $this->faker->name,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'start_date' => now()->format('Y-m-d H:i:s'),
            'end_date' => now()->addDays(1)->format('Y-m-d H:i:s'),
        ];
    }
}
