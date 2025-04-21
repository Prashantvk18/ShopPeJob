<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\State;

class CitySeeder extends Seeder
{
    public function run()
    {
        $tn = State::where('name', 'Tamil Nadu')->first();
        $ka = State::where('name', 'Karnataka')->first();

        // Add cities for each state
        City::updateOrCreate(['name' => 'Chennai', 'state_id' => $tn->id]);
        City::updateOrCreate(['name' => 'Coimbatore', 'state_id' => $tn->id]);
        City::updateOrCreate(['name' => 'Bangalore', 'state_id' => $ka->id]);
    }
}
