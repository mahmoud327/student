<?php
namespace Database\Seeders;

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => '$2y$10$QY0wRJD2oHkRXCEtzukg0O7ZYME6ZqudIvKmGa2HYZFfOr2ooBPHG',
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
