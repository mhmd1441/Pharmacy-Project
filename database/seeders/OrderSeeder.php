<?php

namespace Database\Seeders;

use App\Models\Orders;
use App\Models\Clients;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        Orders::factory()->count(10)->create();

        Orders::create([
            'order_date' => Carbon::now(),
            'total_amount' => 125.50,
            'order_status' => 'pending',
            'client_id' => Clients::inRandomOrder()->first()->id,
        ]);
    }
}
