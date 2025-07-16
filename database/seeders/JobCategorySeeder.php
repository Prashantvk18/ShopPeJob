<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobCategory;

class JobCategorySeeder extends Seeder
{
    public function run()
    {
        // Modify or add job categories        
        // Array of local jobs
        $localJobs = [
            "Any",
            "Electrician",
            "Staff Boy",
            "General Store",
            "Medical",
            "Hardware",
            "Nurse",
            "Beauty Parlor",
            "Tailor",
            "Plumber",
            "Carpenter",
            "Mechanic",
            "Teacher",
            "Driver",
            "Shopkeeper",
            "Gardener",
            "Cook",
            "Cleaner",
            "Barber",
            "Painter",
            "Security Guard",
            "Photographer",
            "Laundry Service",
            "Delivery Boy",
            "Mobile Repair",
            "Mason",
            "Welder",
            "Tutor",
            "Dairy Farmer",
            "Others"
        ];
        
        // Loop through the array and update or create each job category
        foreach ($localJobs as $job) {
            JobCategory::updateOrCreate(['category_name' => $job]);
        }
        
    }
}
