<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Category extends Model
{
    protected $fillable = ['id','name','slug'];

    public function book()
    {
    	return $this->hasMany(Book::class);
    }
}
