<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'quantity', 'sub_total_price', 'is_active', 'id_product','id_user',
        'comment',
    ];

    public function user(){
        return $this->belongsTo('App\User','id_user');
    }

    public function product(){
        return $this->belongsTo('App\Product','id_product');
    }
}
