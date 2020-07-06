<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Member;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $gender = $faker->randomElement(['male', 'female']);
        $id = 2;

        for($i = 1; $i <= 50; $i++){
	        Member::create([
	        	'user_id' 	=> $id,
	        	'phone' 	=> $faker->phoneNumber,
	        	'birthdate' => $faker->date('Y-m-d','now'),
	        	'image' 	=> 'user.jpg',
                'expire_at' => $faker->date('Y-m-d','now'),
	        ]);
            
            $id++;
    	}
    }
}
