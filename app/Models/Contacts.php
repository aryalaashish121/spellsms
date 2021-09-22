<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contacts extends Model
{
    use HasFactory;

    protected $table = "contacts";
    protected $fillable = [
        'mobile', 'name', 'email', 'company', 'address', 'note', 'contact_group_id', 'parent_id',
    ];

    public function group()
    {
        return $this->hasOne(ContactGroup::class, 'id', 'contact_group_id');
    }
}
