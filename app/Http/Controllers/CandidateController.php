<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\EmployerJob;
use App\Models\EmployerBond;
use App\Models\State;
use Illuminate\Support\Facades\Session;

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
}
 