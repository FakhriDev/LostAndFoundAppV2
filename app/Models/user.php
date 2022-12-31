<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    public function post_by(){
        return $this->hasMany('\App\Models\product'::class,'user_id','id');
    }

    public function claim(){
        return $this->hasMany('\App\Models\Claim'::class,'user_id','id');
    }

    public function inti(){
        return $this->hasMany(\App\Models\Claim::class,'post_by','id');
    }
}
