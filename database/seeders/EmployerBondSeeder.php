<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmployerBond;

class EmployerBondSeeder extends Seeder
{
    public function run()
    {
        // Modify or add bond durations
        EmployerBond::updateOrCreate(['bond_duration' => '6 Months']);
        EmployerBond::updateOrCreate(['bond_duration' => '1 Year']);
        EmployerBond::updateOrCreate(['bond_duration' => '2 Years']);
    }
}
