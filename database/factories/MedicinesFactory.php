<?php

namespace Database\Factories;

use App\Models\Medicines;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicines>
 */
class MedicinesFactory extends Factory
{
    protected $model = Medicines::class;

    public function definition()
    {
        return [
            'medicine_name' => $this->faker->unique()->word,
            'sku' => $this->faker->unique()->ean13,
            'description' => $this->faker->sentence,
            'manufacturer' => $this->faker->company,
            'dosage' => $this->faker->numberBetween(1, 500),
            'required_status' => $this->faker->randomElement(['required', 'not_required']),
            'price' => $this->faker->randomFloat(2, 1, 100),
            "quantity" => $this->faker->numberBetween(1, 500),
            'expiry_date' => $this->faker->dateTimeBetween('now', '+5 years')->format('Y-m-d'),
            'production_date' => $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'inventory_id' => $this->faker->numberBetween(1, 10),
            'image' => $this->faker->imageUrl(640, 480, 'medical', true, 'medicine'),
        ];
    }
}
