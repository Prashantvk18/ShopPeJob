<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\State;

class StateSeeder extends Seeder
{
    public function run()
    {
        // Modify or add states here
        $states = [
            'Andhra Pradesh', 'Arunachal Pradesh', 'Assam', 'Bihar', 'Chhattisgarh',
            'Goa', 'Gujarat', 'Haryana', 'Himachal Pradesh', 'Jharkhand',
            'Karnataka', 'Kerala', 'Madhya Pradesh', 'Maharashtra', 'Manipur',
            'Meghalaya', 'Mizoram', 'Nagaland', 'Odisha', 'Punjab',
            'Rajasthan', 'Sikkim', 'Tamil Nadu', 'Telangana', 'Tripura',
            'Uttar Pradesh', 'Uttarakhand', 'West Bengal'
        ];

        foreach ($states as $state) {
            State::updateOrCreate(['name' => $state]);
        }
    }
}
