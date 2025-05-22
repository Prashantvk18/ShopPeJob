<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\EmployerBond;
use App\Models\EmployerJob;
use App\Models\JobCategory;

class ShopOwnerController extends Controller
{
    public function home()
    {   
        $user = \Auth::user();
        $job_data = EmployerJob::where('created_by' , $user->id)->where('is_delete' , 0)->get();
        return view('shop_owner.home',['job_data' => $job_data]);
    }
    public function createjob($id)
    {    $user = \Auth::user();
        $job_data = EmployerJob::where('id' , $id)->where('created_by' , $user->id)->first();
        if($job_data || $id == 0){
            return view('shop_owner.createjob', [
                'job_data'=>$job_data,
                'states' => State::all(),
                'cities' => City::all(),
                'employers_bond' => EmployerBond::all(),
                'jobCategories' => JobCategory::all(),
            ]);
        }
        return redirect()->route('home');
        
    }
    public function storeJob(Request $request)
    {
        $user = \Auth::user();
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
        
        $validated['created_by'] = $user->id;

        // Store job logic here (e.g., Job::create($validated);)
        
        EmployerJob::updateOrCreate(['id' => $request->dataid],$validated);
        return redirect()->route('home')->with('message', 'Job posted successfully.');
    }

    public function job_status(Request $request){
        
        $job_status = EmployerJob::where('id' , $request->id)->first();
        $job_status->is_publish = $request->status == 'true' ? 1 : 0 ;
        $job_status->save();
        return response()->json(['message' => 'Form submitted successfully']);
    }


    public function about_us(){
        return view('shop_owner.aboutus');
    }
}
