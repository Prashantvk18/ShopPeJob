<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\EmployerBond;
use App\Models\JobCategory;

class ShopOwnerController extends Controller
{
    public function home()
    {
        return view('shop_owner.home');
    }
    public function createjob()
    {
        return view('shop_owner.createjob', [
            'states' => State::all(),
            'cities' => City::all(),
            'employers_bond' => EmployerBond::all(),
            'jobCategories' => JobCategory::all(),
        ]);
    }
    public function storeJob(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'state' => 'required|integer',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'type' => 'required|string|in:Full Time,Part Time,Contract',
            'employer_bond' => 'nullable|required_if:type,Contract|integer',
            'salary_min' => 'nullable|integer|min:0',
            'salary_max' => 'nullable|integer|min:0',
            'description' => 'required|string',
            'start_time' => 'required',
            'end_time' => 'required',
            'job_category' => 'required|integer',
            'company_name' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'food_allowance' => 'nullable|boolean',
            'travel_allowance' => 'nullable|boolean',
        ]);

        // Store job logic here (e.g., Job::create($validated);)
        EmployerJob::create($validated);
        return redirect()->route('createjob')->with('message', 'Job posted successfully.');
    }
}
