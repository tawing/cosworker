<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $fillable = [
        'province_name',
        'region_id'
    ];

    protected $primaryKey = 'province_id';

    public $timestamps = false;
}
