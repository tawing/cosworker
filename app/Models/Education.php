<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'educ_name'
    ];
    
    protected $primaryKey = 'educ_id';

    public $timestamps = false;
}
