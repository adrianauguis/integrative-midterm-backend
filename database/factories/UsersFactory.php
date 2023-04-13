<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Users>
 */
class UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'email'=> 'destiny@yahoo.com',
            'password'=> $this->faker()->password(),
            'role'=> $this->faker()->role(),
            'status'=> $this->faker()->status()
        ];
    }
}
