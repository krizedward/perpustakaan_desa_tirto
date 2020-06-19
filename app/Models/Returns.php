<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CodeBook;
use App\Models\Member;

class Returns extends Model
{
    protected $fillable = ['id','codebook_id','member_id'];

    public function codebook()
    {
    	return $this->belongsTo(CodeBook::class);
    }

    public function member()
    {
    	return $this->belongsTo(Member::class);
    }
}
