<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create(
            [
                'parent_id'=>1,
                'login_id'=>'aashish121',
                'phone'=>'9867182424',
                'address'=>'Maitidevi ktm',
                'name'=>'Aashish Aryal',
                'company_name'=>'rvo softsolutions',
                'email'=>'aryalaashish121@gmail.com',
                'password'=>Hash::make('123456789'),
            ]
            );
    }
}
