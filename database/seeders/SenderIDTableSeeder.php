<?php

namespace Database\Seeders;

use App\Models\Message\SenderID;
use App\Models\User;
use Illuminate\Database\Seeder;

class SenderIDTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::first();
        SenderID::Create(
            [
                'sender_id'=>"SMSBIT",
                'company_name'=>"Spellinnovation.com",
                'description'=>"",
                'sample'=>"",
                'is_approved'=>true,
                'route'=>"SMSBIT",
                'parent_id'=>$user->id,
            ]
         );
    }
}
