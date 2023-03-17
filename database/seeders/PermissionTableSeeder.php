<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        $permissions = [
           'role-list',
           'role-show',
           'role-create',
           'role-edit',
           'role-delete',

           'admin-list',
           'admin-create',
           'admin-edit',
           'admin-delete',

           'user-list',
           'user-create',
           'user-edit',
           'user-delete',

           'category-list',
           'category-create',
           'category-edit',
           'category-delete',

           'product-list',
           'product-create',
           'product-edit',
           'product-delete',

           'news-list',
           'news-create',
           'news-edit',
           'news-delete',

        ];

        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission,
            'guard_name'=>'admins']);
        }
    }

}
