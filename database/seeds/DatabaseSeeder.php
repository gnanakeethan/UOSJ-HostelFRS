<?php

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


        $admin = User::create(['name'=>'Admin','email'=>'gnanakeethan@gmail.com','password'=>bcrypt('123456')]);
        $admin->assignRole('superadmin');

        $admin = User::create(['name'=>'Admin','email'=>'admin@hostels.joomtriggers.com','password'=>bcrypt('123123')]);
        $admin->assignRole('admin');

    }
}
