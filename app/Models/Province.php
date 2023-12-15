<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    private $fillable = [
        'province_name',
        'region_id'
    ];

    private $primaryKey = 'province_id';

    public $timestamps = false;
}
