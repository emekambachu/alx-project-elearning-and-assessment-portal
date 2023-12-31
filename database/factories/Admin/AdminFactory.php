<?php

namespace Database\Factories\Admin;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'first_name' => 'Super Admin',
            'last_name' => 'Super Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('11111111'),
//            'remember_token' => Str::random(10),
            'last_login' => $this->faker->dateTime(),
//            'role' => $this->faker->randomElement(array ('admin', 'superadmin')),
            'role' => '0',
        ];
    }
}
