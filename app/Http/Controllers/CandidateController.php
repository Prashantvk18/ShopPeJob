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
use App\Models\JobApplied;

class CandidateController extends Controller
{
    public function home(){
        $user = \Auth::user();
        $applied_job = JobApplied::where('user_id' , $user->id)->pluck('job_id')->filter()->toArray();
        $job_data = EmployerJob::where('is_publish' , 1)->where('is_verified' , 1)->where('is_delete' , 0)->whereNotIn('id' , $applied_job)->get();
        $total_job_count = EmployerJob::where('is_publish' , 1)->where('is_verified' , 1)->where('is_delete' , 0)->count();

        return view('candidate.home',[
             'states' => State::all(),
             'job_data' => $job_data,
             'job_count' => $total_job_count
            ]);
    }

    public function job_details($id,$apl){
        $job_data = EmployerJob::where('id' , $id)->where('is_publish' , 1)->where('is_verified' , 1)->first();
        $employer_bond = EmployerBond::All();
        $employer_state = State::All();
        if($job_data){
            return view('candidate.job_details',[
                'apl' => $apl,
                'job' => $job_data ,
                'employer_bond' => $employer_bond ,
                'state' => $employer_state]);
        }
        return redirect('/home');
       
    }

    public function jobs(Request $request){
        
        $user = \Auth::user();
         $applied_job = JobApplied::where('user_id' , $user->id)->pluck('job_id')->filter()->toArray();
        $job_data = EmployerJob::where('is_publish' , 1)->where('is_verified' , 1)->where('is_delete' , 0)->whereNotIn('id' , $applied_job);
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
            'img_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'dob' => 'required|string',
            'address' => 'required|string',
            'state' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'education' => 'required|string',
            'work_experience' => 'required|string',
            'looking_job' => 'required|string',
            'is_deleted' => 'nullable|boolean',
            'is_verify' => 'nullable|boolean',
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '_' .$request->first_name.'.'.$image->getClientOriginalExtension();
            // Save the file to public/storage/profile_photos
            $image->move(public_path('storage/profile_photos'), $imageName);
        }
       $candidate = CandidateProfile::updateOrCreate(
            ['user_id' => $user->id],
            ['user_id' => $user->id,
             'img_path' =>'profile_photos/' . $imageName,
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

    public function jobapply(Request $request){
        $user = \Auth::user();
        $applied_job = new JobApplied();
        $applied_job->user_id = $user->id;
        $applied_job->job_id = $request->jobid;
        $applied_job->status = 'P';
        $applied_job->save();
        if($request->job){
           return redirect()->route('jobs')->with('message', 'Job Applied successfully.'); 
        }
        if($request->job == 2){
            return redirect()->route('job_details')->with('message', 'Job Applied successfully.'); 
        }
        return redirect()->route('home')->with('message', 'Job Applied successfully.');

    }

    public function appliedjob(){
        $user = \Auth::user();
        $applied_job = JobApplied::where('user_id' , $user->id)->pluck('status' , 'job_id')->filter()->toArray();
        $job_data = EmployerJob::where('is_publish' , 1)->where('is_verified' , 1)->whereIn('id' , array_keys($applied_job))->get();
        return view('candidate.applied_job', [
            'states' => State::all(),
            'job_data' => $job_data,
            'employer_bond' => $employer_bond ,
            'applied_user_status' => $applied_job
        ]);
    }

}
 