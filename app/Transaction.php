<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'total_price', 'shipment_fee', 'shipment_etd', 'address',
        'prove_payment','id_user','id_status','shipment_number'
    ];

    public function detailTransactions(){
        return $this->hasMany('App\DetailTransaction','id_transaction');
    }

    public function user(){
        return $this->belongsTo('App\User','id_user');
    }

    public function status(){
        return $this->belongsTo('App\StatusTransaction','id_status');
    }
}
