<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'ressuffix',
        'educ_id',
        'educ',
        'eligibility',
        'birthdate',
        'gender',
        'address',
        'contact_no',
        'email',
        'marital_status',
        'tin_no',
        'agencyemp_no',
        'activate',
        'deactivate',
        'blacklist',
        'name_ext',
        'ressuffix'
    ];

    protected $primaryKey = 'employee_id';
}
