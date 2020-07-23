<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id','gender','phone','birthdate','image','expire_at','status'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
