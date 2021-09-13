<?php

namespace Database\Seeders;

use App\Models\UserType;
use Illuminate\Database\Seeder;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usertypes = [
            [ 'name'=>'Reseller'],
            [ 'name'=>'Client']
        ];

        foreach($usertypes as $usertype){
            UserType::create($usertype);
        }
    }
}
