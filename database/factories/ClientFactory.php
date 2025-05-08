<?php

namespace Database\Factories;

use App\Models\Clients;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class ClientFactory extends Factory
{
    protected $model = Clients::class;

    public function definition()
    {
        return [
            'username' => $this->faker->unique()->userName,
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'dateOfBirth' => $this->faker->dateTimeBetween('-70 years', '-18 years')->format('Y-m-d'),
            'allergies' => $this->faker->optional(0.3)->randomElement([
                'Peanuts',
                'Penicillin',
                'Shellfish',
                'Latex',
                'Pollen',
                'Dust Mites',
                'Eggs',
                'Milk',
                'Soy',
                'Wheat'
            ]),
            'email' => $this->faker->unique()->safeEmail,
            'mobile_number' => $this->faker->unique()->numerify('##########'),
            'password' => Hash::make('password'),
        ];
    }
}
