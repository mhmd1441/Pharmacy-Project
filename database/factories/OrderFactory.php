<?php

namespace Database\Factories;

use App\Models\Orders;
use App\Models\Clients;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    protected $model = Orders::class;

    public function definition()
    {
        return [
            'order_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'total_amount' => $this->faker->randomFloat(2, 10, 500),
            'order_status' => $this->faker->randomElement(['pending', 'shipped', 'delivered', 'canceled']),
            'client_id' => Clients::inRandomOrder()->first()->id ?? Clients::factory(),
        ];
    }
}
