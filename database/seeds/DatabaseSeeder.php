<?php

use App\Room;
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

        Room::create(['name'=>'18','maximum' => '13']);
        Room::create(['name'=>'22','maximum' => '12']);

        $admin = User::create(['first_name' => 'Gnana', 'username' => 'gnanakeethan', 'email' => 'gnanakeethan@gmail.com', 'password' => bcrypt('123456'), 'facebook_id' => '1183510155031384','room_id'=>1]);
        $admin->assignRole('superadmin');

        $admin = User::create(['first_name' => 'Harshana', 'username' => 'hs4online', 'email' => 'harshanamails@gmail.com', 'password' => bcrypt('123123'),'facebook_id'=>'1513213538706335','room_id'=>1]);
        $admin->assignRole('admin');

        $admin = User::create(['first_name' => 'Dinuka', 'username' => 'dinuka', 'email' => 'wijesinghedinuka@gmail.com', 'password' => bcrypt('123123'),'facebook_id'=>'1212274652191168','room_id'=>2]);
        $admin->assignRole('admin');


    }
}
