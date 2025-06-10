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

        $cities = [
            'Visakhapatnam',
            'Vijayawada',
            'Guntur',
            'Kurnool',
            'Nellore'
        ];
        
        foreach ($cities as $city) {
            City::updateOrCreate(
                ['name' => $city, 'state_id' => $andhraPradesh->id],
                []
            );
        }
        
        // Arunachal Pradesh Cities
        $arunachalPradesh = State::where('name', 'Arunachal Pradesh')->first();
        $cities = [
            'Itanagar',
            'Tawang',
            'Ziro'
        ];

        foreach ($cities as $city) {
            City::updateOrCreate(
                ['name' => $city, 'state_id' => $arunachalPradesh->id],
                []
            );
        }


        // Assam Cities
        $assam = State::where('name', 'Assam')->first();

        $cities = [
            'Guwahati',
            'Dibrugarh',
            'Jorhat',
            'Nagaon'
        ];
        
        foreach ($cities as $city) {
            City::updateOrCreate(
                ['name' => $city, 'state_id' => $assam->id],
                []
            );
        }
        
        // Add cities for other states similarly...

        // Maharashtra Cities
        $maharashtra = State::where('name', 'Maharashtra')->first();

        $cities = [
            'Mumbai',
            'Pune',
            'Nagpur',
            'Nashik',
            'Aurangabad',
            'Thane',
            'Pimpri-Chinchwad',
            'Kalyan-Domibvali',
            'Vasai-Virar',
            'Navi Mumbai',
            'Solapur',
            'Mira-Bhayandar',
            'Bhiwandi-Nizampur MC',
            'Amravati',
            'Nanded Waghala',
            'Kolhapur',
            'Ulhasnagar',
            'Sangli-Miraj-Kupwad',
            'Malegaon',
            'Jalgaon',
            'Akola',
            'Latur',
            'Dhule',
            'Ahmednagar',
            'Chandrapur',
            'Parbhan',
            'Ichalkaranji',
            'Jalna',
            'Ambarnath',
            'Bhusawal',
            'Panvel',
            'Badlapur',
            'Beed',
            'Gondia',
            'Satara',
            'Barshi',
            'Yavatmal',
            'Achalpur',
            'Osmanabad',
            'Nandurbar',
            'Wardha',
            'Udgir',
            'Hinganghat'
        ];
        
        foreach ($cities as $city) {
            City::updateOrCreate(
                ['name' => $city, 'state_id' => $maharashtra->id],
                [] // No fields to update beyond the condition
            );
        }
        
    }
}
