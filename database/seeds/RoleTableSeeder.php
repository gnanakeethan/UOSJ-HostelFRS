<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();

        $roleSuperadmin = $role->create([
            'name' => 'Super Admin',
            'slug' => 'superadmin',
            'description' => 'Super Admin'
        ]);
        $roleAdmin = $role->create([
            'name' => 'Administrator',
            'slug' => 'admin',
            'description' => 'manage administration privileges'
        ]);
        $roleAdmin->assignPermission("users.admin");

        $roleManager = $role->create([
            'name' => 'Manager',
            'slug' => 'manager',
            'description' => 'Manage Certain things'
        ]);
        $roleManager->assignPermission("users.manager");

        $roleUser = $role->create([
            'name' => 'User',
            'slug' => 'user',
            'description' => 'create certain things'
        ]);

        //
    }
}
