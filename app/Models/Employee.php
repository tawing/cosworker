<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    private $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'ressuffix',
        'educ_id',
        'educ',
        'eligibility',
        'bday',
        'gender',
        'address',
        'contactno',
        'email',
        'mstatus',
        'tinno',
        'agencyempno',
        'activate',
        'deactivate',
        'blacklist',
        'name_ext',
    ];

    private $primaryKey = 'employee_id';
}
