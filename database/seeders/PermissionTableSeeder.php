<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['name'=>'Client'],
            ['name'=>'Reseller']
        ];

        foreach($roles as $role){
            Role::create($role);
        }

        //permission

    }
}