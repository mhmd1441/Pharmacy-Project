<?php

namespace Database\Seeders;

use App\Models\Clients;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Clients::factory()->count(10)->create();
        Clients::create([

            'username' => 'Mhmd1441',
            'first_name' => 'Mhmd',
            'last_name' => 'Moumneh',
            'dateOfBirth' => Carbon::parse('2004-10-12'),
            'allergies' => 'Peanuts, Penicillin',
            'email' => 'mmoumneh14@gmail.com',
            'mobile_number' => '81809597',
            'password' => Hash::make('Mohamad123'),
        ]);
    }
}
