<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected static ?string $password = null;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'NIK' => $this->faker->unique()->numerify('3578##############'), // ganti nik() dengan ini
            'email' => $this->faker->unique()->safeEmail(),
            'phone_num' => $this->faker->unique()->numerify('08##########'),
            'password' => static::$password ??= Hash::make('password'),
            'profile_pic' => null,
            'status' => false,
            'remember_token' => Str::random(10),
            'role' => 1, // default user
            'is_google_user' => false,
        ];
    }

    public function admin(): static
    {
        return $this->state(fn (array $attributes) => ['role' => 2]);
    }

    public function driver(): static
    {
        return $this->state(fn (array $attributes) => ['role' => 3]);
    }
}
