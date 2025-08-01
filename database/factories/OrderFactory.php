<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Order;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;

    public function definition(): array
    {
        return [
            // 'user_id' => User::factory(),
            // 'user_id' => User::where('role', 1)->inRandomOrder()->first()->user_id,
            // 'date_time_request' => $this->faker->dateTimeThisMonth(),
            // 'pickup_time' => $this->faker->dateTimeBetween('+1 hour', '+2 days'),
            // 'photo' => 'default.jpg',
            // 'status' => 1,
            'user_id' => User::where('role', 1)->inRandomOrder()->first()?->user_id ?? User::factory(),
            'date_time_request' => now()->setDate(2025, 8, rand(1, 28)), // AGUSTUS
            'pickup_time' => now()->setDate(2025, 8, rand(1, 28))->addHours(rand(1, 48)),
            'photo' => 'default.jpg',
            'status' => 1,
        ];
    }
}
