<?php

namespace Database\Seeders;

use App\Models\Pharmacies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PharmacySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pharmacies::factory()->count(10)->create();
    }
}
