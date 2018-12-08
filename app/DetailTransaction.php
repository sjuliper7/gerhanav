<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    protected $fillable = [
        'quantity', 'comment', 'sub_total_price', 'id_transaction','id_product','id_cart',
    ];

    public function product(){
        return $this->belongsTo('App\Product','id_product');
    }

    public function transaction(){
        return $this->belongsTo('App\Transaction','id_transaction');
    }

}
