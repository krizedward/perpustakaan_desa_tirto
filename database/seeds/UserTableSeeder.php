<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'id'		=>'1',
        	'name'		=>'Admin', 
        	'email'		=>'Admin@admin.com', 
        	'password'	=> bcrypt('12345678'),
        ]);

        User::create([
        	'id'		=>'2',
        	'name'		=>'User', 
        	'email'		=>'User@user.com', 
        	'password'	=> bcrypt('12345678'),
        ]);
    }
}
