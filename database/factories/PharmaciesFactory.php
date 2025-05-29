<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pharmacies>
 */
class PharmaciesFactory extends Factory
{
    public function definition(): array
    {
        $cities = ['New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix'];
        $states = ['NY', 'CA', 'IL', 'TX', 'AZ'];

        return [
            'name' => $this->faker->unique()->company() . ' Pharmacy',
            'description' => $this->faker->paragraph(),
            'license_number' => 'PHARM' . $this->faker->unique()->numerify('#######'),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->streetAddress(),
            'city' => Arr::random($cities),
            'state' => Arr::random($states),
            'zip_code' => $this->faker->postcode(),
            'latitude' => $this->faker->latitude(32, 47),
            'longitude' => $this->faker->longitude(-122, -73),
            'business_hours' => json_encode([
                'monday' => ['open' => '08:00', 'close' => '20:00'],
                'tuesday' => ['open' => '08:00', 'close' => '20:00'],
                'wednesday' => ['open' => '08:00', 'close' => '20:00'],
                'thursday' => ['open' => '08:00', 'close' => '20:00'],
                'friday' => ['open' => '08:00', 'close' => '20:00'],
                'saturday' => ['open' => '09:00', 'close' => '18:00'],
                'sunday' => ['open' => '10:00', 'close' => '16:00'],
            ]),
            'is_24_hours' => $this->faker->boolean(10),
            'has_emergency_services' => $this->faker->boolean(30),
            'accepts_insurance' => $this->faker->boolean(80),
            'delivery_fee' => $this->faker->randomFloat(2, 0, 10),
            'min_order_amount' => $this->faker->randomFloat(2, 0, 20),
            'delivery_radius_km' => $this->faker->numberBetween(5, 15),
            'is_delivery_available' => $this->faker->boolean(90),
            'is_verified' => true,
            'is_active' => true,
        ];
    }
}
