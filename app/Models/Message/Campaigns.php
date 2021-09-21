<?php

namespace App\Models\Message;

use App\Http\Controllers\Message\CampaignsController;
use App\Models\CampaignCategory;
use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaigns extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','description','parent_id','default_route','is_default','category_id'
    ];

    public function category(){
        return $this->hasOne(CampaignCategory::class,'id','category_id');
    }

    public function route(){
        return $this->hasOne(Route::class,'id','default_route');
    }
}
