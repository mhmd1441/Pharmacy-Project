<?php

namespace Database\Seeders;

use App\Models\Employees;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employees::factory()->count(10)->create();
        Employees::create([
            'first_name'    => 'Mhmd',
            'last_name'     => 'Moumneh',
            'email'         => 'mmoumneh14@gmail.com',
            'mobile_number' => '81809597',
            'role'          => 'pharmacist',
            'status'        => 'active',
            'hire_date'     => Carbon::parse('2023-04-01'),
            'password'      => Hash::make('Mohamad123'),
        ]);
    }
}
