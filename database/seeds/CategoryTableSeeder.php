<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
        	'id' 	=> '1',
        	'name' 	=> 'Fabel',
        	'slug' 	=> 'fabel',
        ]);

        Category::create([
        	'id' 	=> '2',
        	'name' 	=> 'Non Fabel',
        	'slug' 	=> 'non-fabel',
        ]);
    }
}
