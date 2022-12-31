<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClaimProduct extends Model
{
    protected $fillable =[
        'id',
        'claim_id',
        'product_name',
        'product_image',
        'product_description',
        'status',
        'question'
    ];
    
    public function Claim(){
        return $this->belongsTo(\App\Models\Claim::class,'claim_id','product_id');
    }
}
