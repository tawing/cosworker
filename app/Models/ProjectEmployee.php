<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectEmployee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'blacklist',
        'remarks',
        'project_id',
    ];
    
    
}
