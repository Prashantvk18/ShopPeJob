<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\EmployerBond;
use App\Models\EmployerJob;
use App\Models\JobCategory;
use App\Models\JobApplied;
use App\Models\CandidateProfile;

class ShopOwnerController extends Controller
{
    public function home()
    {   
        $user = \Auth::user();
        $job_data = EmployerJob::where('created_by' , $user->id)->where('is_delete' , 0)->get();
        return view('shop_owner.home',[
            'states' => State::all(),
            'job_data' => $job_data
        ]);
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
        return redirect()->route('shome');
        
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
            'gender' => 'required|string',
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
        return redirect()->route('shome')->with('message', 'Job posted successfully.');
    }

    public function job_status(Request $request){
        
        $job_status = EmployerJob::where('id' , $request->id)->first();
        $job_status->is_publish = $request->status == 'true' ? 1 : 0 ;
        $job_status->save();
        return response()->json(['message' => 'Form submitted successfully']);
    }

    public function applieduser($id){
        $user = \Auth::user();
        $job_data = EmployerJob::where('created_by' , $user->id)->where('id' , $id)->first();
        if($job_data){
            $applied_user = JobApplied::Where('job_id' , $id)->pluck('status' , 'user_id')->toArray();
                $applied_user_data = CandidateProfile::whereIn('user_id' , array_keys($applied_user))->get();
                return view('shop_owner.applied_user',[
                'states' => State::all(),
                'job_data'=> $job_data,
                'jobCategories' => JobCategory::all(),
                'applied_user_data' => $applied_user_data,
                'applied_user_status' => $applied_user
            ]);
        }
        return redirect()->route('shome');  
    }

    public function user_details(Request $request){
        $user = \Auth::user();
        $job_id = EmployerJob::where('created_by' , $user->id)->where('id' , $request->jid)->pluck('id')->toArray();
        $applied_user = JobApplied::WhereIn('job_id' , $job_id)->where('user_id',$request->id)->first();
        if($applied_user){
            $user_data = CandidateProfile::where('user_id' , $request->id)->first();
            return view('shop_owner.user_details',[
            'states' => State::all(),
            'user_data' => $user_data,
            'apply_job_id' => $applied_user
        ]);
        }
        return redirect()->route('shome');
    }

    public function user_jobstatus(Request $request){
        
        $user = \Auth::user();
        $job_id = EmployerJob::where('created_by' , $user->id)->pluck('id')->toArray();
        $applied_job_id = JobApplied::WhereIn('job_id' , $job_id)->pluck('id')->toArray();
        if(in_array($request->jobid , $applied_job_id)){
            $change_status = JobApplied::where('id' , $request->jobid)->first();
            $change_status->status = $request->status;
            $change_status->accept_by = $user->id;
            $change_status->save();
            return response()->json(['message' => 'Status Updated Successfully']);
        };
        return response()->json(['errors' =>'Wrong Input'], 400);
    }

    public function job_delete(Request $request){
        $user = \Auth::user();
        $job = EmployerJob::where('created_by' , $user->id)->where('id' , $request->id)->first();
        if($job){
            $job->is_delete = 1;
            $job->save();
            return response()->json(['message' => 'Job deleted Successfully']);
        }
        return response()->json(['errors' =>'Wrong Input'], 400);
    }
    public function about_us(){
        return view('shop_owner.aboutus');
    }
}
