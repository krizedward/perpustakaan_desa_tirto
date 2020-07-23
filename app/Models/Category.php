<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Book;

class Category extends Model
{
    use SoftDeletes;
	
    protected $fillable = ['id','name','slug'];

    public function book()
    {
    	return $this->hasMany(Book::class);
    }
}
