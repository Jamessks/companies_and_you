<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Optional: Create some users if you don't have any
        User::factory()->count(10)->create(); // Adjust the number as needed

        // Create companies and associate them with users
        Company::factory()->count(40)->create(); // Create 20 companies
    }
}
