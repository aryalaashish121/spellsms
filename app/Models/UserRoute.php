<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserRoute extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','balance','validity','status','route_id',
    ];

  
}
