<?php

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
        	'id'			=> '1',
			'category_id'	=> '2',
			'title'			=> 'kancil mencuri mentimun',
			'description'	=> 'buku baru',
			'stock'			=> '3',
			'image_cover'	=> 'cover.img',
			'status'		=> 'dipinjam',
			'slug'			=> 'kancil-muncuri-mentimun',
        ]);

        Book::create([
        	'id'			=> '2',
			'category_id'	=> '1',
			'title'			=> 'maling kundang',
			'description'	=> 'buku baru',
			'stock'			=> '3',
			'image_cover'	=> 'cover.img',
			'status'		=> 'dipinjam',
			'slug'			=> 'maling-kundang',
        ]);
    }
}
