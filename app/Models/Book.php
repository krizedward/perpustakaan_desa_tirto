<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\CodeBook;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = ['id','category_id','title','description','stock','image_cover','slug'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }

    public function codebook()
    {
    	return $this->hasMany(CodeBook::class);
    }
}
