<?php

namespace App\Models\Message;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'parent_id',
        'route_id',
        'senderid','contacts','sms_type','content'
    ];
}
