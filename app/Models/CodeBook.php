<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class CodeBook extends Model
{
    protected $fillable = ['id','book_id','code','status'];

    public function book()
    {
    	return $this->belongsTo(Book::class);
    }
}
