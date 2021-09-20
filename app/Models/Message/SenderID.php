<?php

namespace App\Models\Message;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SenderID extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id','company_name','description','sample','route','parent_id','is_approved',
    ];
}
