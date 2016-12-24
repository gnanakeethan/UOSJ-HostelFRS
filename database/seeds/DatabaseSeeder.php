<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Database\Eloquent\Model::unguard();
        $this->call(PermissionTableSeeder::class);
        $this->call(RoleTableSeeder::class);


        $admin = User::create(['first_name'=>'Admin','username'=>'gnanakeethan','email'=>'gnanakeethan@gmail.com','password'=>bcrypt('123456'),'facebook_id'=>'1183510155031384']);
        $admin->assignRole('superadmin');

        $admin = User::create(['first_name'=>'Admin','username'=>'admin','email'=>'admin@hostels.joomtriggers.com','password'=>bcrypt('123123')]);
        $admin->assignRole('admin');

    }
}
