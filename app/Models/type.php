<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    public function tproduct(){
        return $this->hasMany(\App\Models\product::class,'type','id');
    }
}
