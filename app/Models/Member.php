<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Member extends Model
{
    protected $fillable = ['user_id','gender','phone','birthdate','image','expire_at'];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}
