<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pending extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'employee_id',
        'date',
        'training',
        'mandays',
        'startdate1',
        'enddate1',
        'startdate2',
        'enddate2',
    ];

    protected $primaryKey = 'penstatus_id';
}
