<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\Member;

class Borrow extends Model
{
    protected $fillable = ['id','book_id','member_id','status'];

    public function book()
    {
    	return $this->belongsTo(Book::class);
    }

    public function member()
    {
    	return $this->belongsTo(Member::class);
    }
}
