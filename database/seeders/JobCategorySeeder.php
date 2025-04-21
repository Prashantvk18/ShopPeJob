<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobCategory;

class JobCategorySeeder extends Seeder
{
    public function run()
    {
        // Modify or add job categories
        JobCategory::updateOrCreate(['category_name' => 'IT & Software']);
        JobCategory::updateOrCreate(['category_name' => 'Construction']);
        JobCategory::updateOrCreate(['category_name' => 'Healthcare']);
    }
}
