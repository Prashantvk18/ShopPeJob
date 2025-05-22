<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\State;

class CitySeeder extends Seeder
{
    public function run()
    {
        $andhraPradesh = State::where('name', 'Andhra Pradesh')->first();
        City::create(['name' => 'Visakhapatnam', 'state_id' => $andhraPradesh->id]);
        City::create(['name' => 'Vijayawada', 'state_id' => $andhraPradesh->id]);
        City::create(['name' => 'Guntur', 'state_id' => $andhraPradesh->id]);
        City::create(['name' => 'Kurnool', 'state_id' => $andhraPradesh->id]);
        City::create(['name' => 'Nellore', 'state_id' => $andhraPradesh->id]);

        // Arunachal Pradesh Cities
        $arunachalPradesh = State::where('name', 'Arunachal Pradesh')->first();
        City::create(['name' => 'Itanagar', 'state_id' => $arunachalPradesh->id]);
        City::create(['name' => 'Tawang', 'state_id' => $arunachalPradesh->id]);
        City::create(['name' => 'Ziro', 'state_id' => $arunachalPradesh->id]);

        // Assam Cities
        $assam = State::where('name', 'Assam')->first();
        City::create(['name' => 'Guwahati', 'state_id' => $assam->id]);
        City::create(['name' => 'Dibrugarh', 'state_id' => $assam->id]);
        City::create(['name' => 'Jorhat', 'state_id' => $assam->id]);
        City::create(['name' => 'Nagaon', 'state_id' => $assam->id]);

        // Add cities for other states similarly...

        // Maharashtra Cities
        $maharashtra = State::where('name', 'Maharashtra')->first();
        City::create(['name' => 'Mumbai', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Pune', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Nagpur', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Nashik', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Aurangabad', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Thane', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Pimpri-Chinchwad', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Kalyan-Domibvali', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Vasai-Virar', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Vasai-Virar', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Navi Mumbai', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Solapur', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Mira-Bhayandar', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Bhiwandi-Nizampur MC', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Amravati', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Nanded Waghala', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Kolhapur', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Ulhasnagar', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Sangli-Miraj-Kupwad', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Malegaon', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Jalgaon', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Akola', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Latur', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Dhule', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Ahmednagar', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Chandrapur', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Parbhan', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Ichalkaranji', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Jalna', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Ambarnath', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Bhusawal', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Panvel', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Badlapur', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Beed', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Gondia', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Satara', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Barshi', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Yavatmal', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Achalpur', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Osmanabad', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Nandurbar', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Wardha', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Udgir', 'state_id' => $maharashtra->id]);
        City::create(['name' => 'Hinganghat', 'state_id' => $maharashtra->id]);
    }
}
