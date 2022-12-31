<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{   
    protected $fillable =[
        'id',
        'user_id',
        'status',
        'answer',
        'claim_date',
        'post_by',
        'product_id'
    ];

    public const PROCESS = 'Process';
    public const CONFIRMED = 'Confirmed';
    public const CANCELLED = 'Cancelled';

    public function User(){
        return $this->belongsTo('\App\Models\user');
    }

    public function inti(){
        return $this->belongsTo(\App\Models\user::class,'post_by','id');
    }

    public function product(){
        return $this->belongsTo(\App\Models\ClaimProduct::class,'product_id','claim_id');
    }
}
