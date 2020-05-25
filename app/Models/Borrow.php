<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Borrow extends Model
{
    protected $fillable = ['id','book_id','user_id','status'];

    public function book()
    {
    	return $this->belongsTo(Book::class);
    }

    public function user()
    {
    	return $this->belongsTo('App/User');
    }
}
