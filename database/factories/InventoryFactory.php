<?php

namespace Database\Factories;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inventory>
 */
class InventoryFactory extends Factory
{
    protected $model = Inventory::class;

    public function definition()
    {
        return [
            'inventory_name' => $this->faker->unique()->words(3, true),
            'city' => $this->faker->city,
            'country' => $this->faker->country,
            'street' => $this->faker->streetAddress,
            'building' => $this->faker->buildingNumber,
            'quantity_in_stock' => $this->faker->numberBetween(0, 1000),
            'last_updated' => $this->faker->date(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
