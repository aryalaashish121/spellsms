<?php

namespace App\Models;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;

class BlackListContact extends Model implements
ShouldQueue
{
    use HasFactory;

    protected $fillable = [
        'name','mobile'
    ];

    public static function blackListedContacts(){
        $contacts =  BlackListContact::pluck('mobile');
        return $contacts->toArray();
    }
}
