<?php

use Illuminate\Database\Seeder;
use App\Models\Borrow;

class BorrowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Borrow::create([
        	'id'		=> '1',
			'book_id'	=> '1',
			'user_id'	=> '1',
			'status'	=> 'borrow',
        ]);
    }
}
