<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
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
            'password'  => bcrypt('12345678'),
        	'level'	    =>'staff',
        ]);

        $faker = Faker::create('id_ID');

        for($i = 1; $i <= 50; $i++){
            User::create([
                'name'      => $faker->name,
                'email'     => $faker->email,
                'password'  => bcrypt('12345678'),
                'level'  => 'member',
            ]);
        }
    }
}
