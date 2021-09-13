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
                'name'=>'Aashish Aryal',
                'is_admin'=>true,
                'email'=>'aryalaashish121@gmail.com',
                'password'=>Hash::make('123456789'),
                'phone'=>'9867182424',
            ]
            );
    }
}
