<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new Permission();

        //Users Permission
        $adminUser = $permission->create([
            'name' => 'users.admin',
            'slug' => [          // pass an array of permissions.
                'create' => false,
                'view' => true,
                'update' => true,
                'delete' => false,
            ],
        ]);
        $permission->create([
            'name' => 'users.manager',
            'slug' => [          // pass an array of permissions.
                'create' => false,
                'update' => false,
                'delete' => false,
            ],
            'inherit_id' => $adminUser->getKey(),

        ]);
    }
}
