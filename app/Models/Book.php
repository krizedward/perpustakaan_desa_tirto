<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Book extends Model
{
    protected $fillable = ['id','category_id','title','description','stock','image_cover','status','slug'];

    public function category()
    {
    	return $this->belongsTo(Category::class);
    }
}
