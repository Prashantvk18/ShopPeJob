<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerBond extends Model
{
    use HasFactory;

    protected $fillable = ['bond_duration'];
}
