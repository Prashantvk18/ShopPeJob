<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    public function run()
    {
        // Modify or add states here
        State::updateOrCreate(['name' => 'Tamil Nadu']);
        State::updateOrCreate(['name' => 'Karnataka']);
        State::updateOrCreate(['name' => 'Maharashtra']);
    }
}
