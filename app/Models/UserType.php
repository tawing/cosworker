<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    protected $fillable = [
        'usertype_name',
    ];
    
    protected $primaryKey = 'usertype_id';

    public $timestamps = false;

    protected $table = 'usertypes';

}
