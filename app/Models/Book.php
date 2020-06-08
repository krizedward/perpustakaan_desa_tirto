<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\CodeBook;

class Book extends Model
{
    protected $fillable = ['id','category_id','title','description','stock','status','image_cover','slug'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function codebook()
    {
    	return $this->hasMany(CodeBook::class);
    }
}
