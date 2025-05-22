<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Call your individual seeders
        $this->call([
            StateSeeder::class,
            CitySeeder::class,
            EmployerBondSeeder::class,
            JobCategorySeeder::class,
        ]);
    }
}
