<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EmployerBond;
use Illuminate\Support\Facades\DB;

class EmployerBondSeeder extends Seeder
{
    public function run()
    {
        // Modify or add bond durations
        DB::table('employer_bonds')->truncate();
        EmployerBond::updateOrCreate(['bond_duration' => 'For Days'], ['salary_type' => 'Day']);
        EmployerBond::updateOrCreate(['bond_duration' => 'For Months'], ['salary_type' => 'Month']);
        EmployerBond::updateOrCreate(['bond_duration' => 'For Year'], ['salary_type' => 'Month']);
    }
}
