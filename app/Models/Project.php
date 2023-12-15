<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    private $fillable = [
        'project_name'
    ];

    private $primaryKey = 'project_id';
}
