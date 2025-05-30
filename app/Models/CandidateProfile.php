<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateProfile extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'candidate_profiles';

    // Define the fillable fields (to allow mass assignment)
    protected $fillable = [
        'img_path',
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'mobile_no',
        'gender',
        'dob',
        'address',
        'state',
        'city',
        'education',
        'work_experience',
        'looking_job',
        'salary_expect',
        'got_job',
        'is_active',
        'is_verify',
    ];

    // Define the attributes that are cast to native types (optional)
    protected $casts = [
        'got_job' =>'boolean',
        'is_active' => 'boolean',
        'is_verify' => 'boolean',
    ];
}
