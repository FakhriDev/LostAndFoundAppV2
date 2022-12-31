<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function Category(){
        return $this->belongsTo(\App\Models\Category::class,'category_id','id');
    }

    public function User(){
        return $this->belongsTo(\App\Models\user::class,'user_id','id');
    }
    
    public function Claim(){
        return $this->belongsTo(\App\Models\Claim::class,'id','product_id');
    }
    public function types(){
        return $this->belongsTo(\App\Models\type::class,'type','id');
    }
}