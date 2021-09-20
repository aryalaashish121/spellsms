<?php

namespace Database\Seeders;

use App\Models\CampaignCategory;
use Illuminate\Database\Seeder;

class CampaignCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $categories = [
            ['name'=>"News and Infos"],
            ['name'=>"Education"],
            ['name'=>"Rigntones/ WAP contents"],
            ['name'=>"Carrers and Jobs"],
            ['name'=>"Others"],
        ];

        foreach($categories as $category){
            CampaignCategory::create($category);
        }
    
    }
}
