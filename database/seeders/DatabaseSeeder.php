<?php

use App\User;
use App\Permission;
use App\Role;
use Database\Seeders\AdminSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {



        $this->call([
            AdminSeeder::class
        ]);
    }
}
