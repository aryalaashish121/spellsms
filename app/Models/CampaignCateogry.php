<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignCateogry extends Model
{
    use HasFactory;

    protected $table = "campaign_categories";

    protected $fillable = [
        'name'
    ];
}
