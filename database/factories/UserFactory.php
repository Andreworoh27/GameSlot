<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $genderfake = fake()->numberBetween(0, 1);
        $rolefake = fake()->numberBetween(0, 1);
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('testpassword'), // password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at'=> null,
            'gender' => $genderfake ==1 ? 'Male' : 'Female',
            'dob' => fake()->date(),
            'image'=>'default profile.png',
            'role' => $rolefake == 1 ? 'Admin' : 'Member',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
