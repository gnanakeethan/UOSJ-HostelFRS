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

        Room::create(['name' => '18', 'maximum' => '13']);
        Room::create(['name' => '22', 'maximum' => '12']);
        Room::create(['name' => '7', 'maximum' => '4']);

        $admin = User::create(['name' => 'Gnana', 'email' => 'gnanakeethan@gmail.com', 'password' => bcrypt('123456'), 'facebook_id' => '1183510155031384', 'room_id' => 1,'ideamart_id'=>'tel:94771122336']);
        $admin->assignRole('superadmin');

        $admin = User::create(['name' => 'Harshana', 'email' => 'harshanamails@gmail.com', 'password' => bcrypt('123123'), 'facebook_id' => '1513213538706335', 'room_id' => 1]);
        $admin->assignRole('admin');

        $admin = User::create(['name' => 'Dinuka', 'email' => 'wijesinghedinuka@gmail.com', 'password' => bcrypt('123123'), 'facebook_id' => '1212274652191168', 'room_id' => 2]);
        $admin->assignRole('admin');
        $admin = User::create(['name' => 'Roshan', 'email' => 'roshansenaka@gmail.com', 'password' => bcrypt('123123'), 'facebook_id' => '1000306353408036', 'room_id' => 2]);
        $admin = User::create(['name' => 'Ijas', 'email' => 'ijaslafir@gmail.com', 'password' => bcrypt('123123'), 'facebook_id' => '1278096158913334', 'room_id' => 3]);


    }
}
