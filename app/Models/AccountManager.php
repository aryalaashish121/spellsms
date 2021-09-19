<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountManager extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','parent_id','email','phone','whatsapp','facebook_url','image'
    ];
}