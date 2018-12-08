<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'comment','rating','status','id_product','id_user',
    ];

    public function user(){
        return $this->belongsTo('App\User','id_user');
    }

    public function product(){
        return $this->belongsTo('App\User','id_product');
    }

    public function scopeApproved($query)
    {
        return $query->where('status', 1);
    }

    public function scopeSpam($query)
    {
        return $query->where('status', 2);
    }
}
