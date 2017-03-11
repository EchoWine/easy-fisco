<?php

use Core\User\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'username' => 'admin1',
        	'email' => 'admin1@admin.com',
        	'name' => 'Admin',
        	'password' => \Hash::make('admin'),
        ]);


    }
}
