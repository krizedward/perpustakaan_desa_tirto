<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use Illuminate\Database\Eloquent\SoftDeletes;

class CodeBook extends Model
{
    use SoftDeletes;

    protected $fillable = ['id','book_id','code','status'];

    public function book()
    {
    	return $this->belongsTo(Book::class);
    }
}
