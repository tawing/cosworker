<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecentsStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'action'
    ];

    protected $primaryKey = 'recstats_id';

    public $timestamps = false;
}
