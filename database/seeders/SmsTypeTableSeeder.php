<?php

namespace Database\Seeders;

use App\Models\SMSType;
use Illuminate\Database\Seeder;

class SmsTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $smstypes = [
            ['name'=>'Text'],
            ['name'=>'Nepali'],
            ['name'=>'Dynamic'],
        ];

        foreach($smstypes as $type){
            SMSType::create($type);
        }

    }
}
