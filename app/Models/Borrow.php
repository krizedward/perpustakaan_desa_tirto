<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CodeBook;
use App\Models\Member;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrow extends Model
{
    use SoftDeletes;

    protected $fillable = ['id','codebook_id','member_id','action'];

    public function codebook()
    {
    	return $this->belongsTo(CodeBook::class);
    }

    public function member()
    {
    	return $this->belongsTo(Member::class);
    }
}
