<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\EmployerJob;
use App\Models\EmployerBond;
use App\Models\State;
use App\Models\City;
use App\Models\JobCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\CandidateProfile;

class CandidateController extends Controller
{
    public function home(){
        $user = \Auth::user();
        $job_data = EmployerJob::where('is_publish' , 1)->where('is_verified' , 1)->where('is_delete' , 0)->get();
        return view('candidate.home',['job_data' => $job_data]);
    }

    public function job_details($id){
        $job_data = EmployerJob::where('id' , $id)->where('is_publish' , 1)->where('is_verified' , 1)->where('is_delete' , 0)->first();
        $employer_bond = EmployerBond::All();
        $employer_state = State::All();
        if($job_data){
            return view('candidate.job_details',['job' => $job_data , 'employer_bond' => $employer_bond , 'state' => $employer_state]);
        }
        return redirect('/home');
       
    }

    public function jobs(Request $request){
        
        $user = \Auth::user();
        $job_data = EmployerJob::where('is_publish' , 1)->where('is_verified' , 1)->where('is_delete' , 0);
        if($request->state){
            $job_data =  $job_data->where('state' , $request->state);
        }
        if($request->city){
             $job_data  =   $job_data->where('city' , $request->city);
        }
        if($request->looking_job){
            $job_data = $job_data->where('job_category' , $request->looking_job);
        }
        
        return view('candidate.jobs',[
            'cities' => City::all(),
            'states' => State::all(),
            'jobCategories' => JobCategory::all(),
            'job_data' => $job_data->get()
        ]);
    }

    public function about_us(){
        return view('candidate.aboutus');
    }

    public function profilecreate()
    {   
        $user = \Auth::user();
        $profile_data = CandidateProfile::where('user_id' , $user->id)->first();
        
        return view('candidate.profile',[
            'states' => State::all(),
            'cities' => City::all(),
            'jobCategories' => JobCategory::all(),
            'profile_data'=>$profile_data ,
            'mob_number' => $user->number
        ]);
    }

    public function profilestore(Request $request)
    {   
        $user = \Auth::user();
        
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            
            'dob' => 'required|string',
            'address' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'education' => 'required|string',
            'work_experience' => 'required|string',
            'looking_job' => 'required|string',
            'is_deleted' => 'nullable|boolean',
            'is_verify' => 'nullable|boolean',
        ]);
       

       $candidate = CandidateProfile::updateOrCreate(
            ['user_id' => $user->id],
            ['user_id' => $user->id,
             'first_name' => $request->first_name,
             'middle_name' => $request->middle_name,
             'last_name' => $request->last_name,
             'mobile_no' => $user->number,
             'dob' => $request->dob,
             'address' => $request->address,
             'state' => $request->state,
             'salary_expect'=>$request->salary_expected,
             'gender' => $request->gender,
             'city' => $request->city,
             'education' => $request->education,
             'work_experience' => $request->work_experience,
             'looking_job' => $request->looking_job,
             'is_active' => $request->is_deleted ?? 0,
             'is_verify' => $request->is_verify ?? 0,
        ]);
        return redirect()->route('profilecreate')->with('message', 'Profile Updated successfully.');
    }

}
 