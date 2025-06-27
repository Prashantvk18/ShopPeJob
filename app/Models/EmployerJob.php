<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployerJob extends Model
{
    protected $fillable = [
        'title',
        'state',
        'city',
        'address',
        'type',
        'contract_period',
        'gender',
        'employer_bond',
        'from_date',
        'to_date',
        'salary_min',
        'salary_max',
        'description',
        'start_time',
        'end_time',
        'job_category',
        'company_name',
        'name',
        'phone_number',
        'food_allowance',
        'dinner',
        'stay',
        'travel_allowance',
        'created_by'
    ];
}
