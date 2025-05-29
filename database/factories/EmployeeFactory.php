<?php

namespace Database\Factories;

use App\Models\Employees;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employees>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employees::class;

    public function definition(): array
    {
        $roles = ['pharmacist', 'manager', 'driver'];
        $statuses = ['active', 'onLeave'];
        return [
            'first_name'    => $this->faker->firstName(),
            'last_name'     => $this->faker->lastName(),
            'email'         => $this->faker->unique()->safeEmail(),
            'mobile_number' => $this->faker->unique()->numerify('##########'),
            'role'          => $this->faker->randomElement($roles),
            'status'        => $this->faker->randomElement($statuses),
            'hire_date'     => $this->faker->dateTimeBetween('-5 years', 'now')->format('Y-m-d'),
            'password'      => Hash::make('password'),
        ];
    }
}
