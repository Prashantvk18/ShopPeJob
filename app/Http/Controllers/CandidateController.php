<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\EmployerJob;
use App\Models\EmployerBond;
use App\Models\State;
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

    public function jobs(){
        $user = \Auth::user();
        $job_data = EmployerJob::where('is_publish' , 1)->where('is_verified' , 1)->where('is_delete' , 0)->get();
        return view('candidate.jobs',['job_data' => $job_data]);
    }

    public function about_us(){
        return view('candidate.aboutus');
    }

    public function profilecreate()
    {
        return view('candidate.profile');
    }

    public function profilestore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile_no' => 'required|string|max:15',
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
        if ($validator->fails()) {
            $errmsg_arr = [];
            foreach($validator->errors()->all() as $val){
                $errmsg_arr[] = $val;
            }
            $errmsg_str = implode(",",$errmsg_arr);
            return response()->json(['errors' => $errmsg_str], 400);
        }
        $candidate = CandidateProfile::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'mobile_no' => $request->mobile_no,
            'dob' => $request->dob,
            'address' => $request->address,
            'state' => $request->state,
            'salary_expect'=>'1000',
            'gender' => 'M',
            'city' => $request->city,
            'education' => $request->education,
            'work_experience' => $request->work_experience,
            'looking_job' => $request->looking_job,
           
            'is_active' => $request->is_deleted ?? 0,
            'is_verify' => $request->is_verify ?? 0,
        ]);
        return response()->json([
            'message' => 'Candidate Profile created successfully',
            'data' => $candidate
        ], 201);
    }

}
 