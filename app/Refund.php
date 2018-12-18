<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    protected $fillable = [
        'id_product', 'id_user', 'id_detail_transaction', 'id_request_refund', 'no_rekening_tujuan',
        'atas_nama', 'jenis_bank', 'kurir_pengiriman',
        ];

    public function product(){
        return $this->belongsTo('App\Product','id_product');
    }

    public function user(){
        return $this->belongsTo('App\User','id_user');
    }

    public function detailTransaction(){
        return $this->belongsTo('App\DetailTransaction', 'id_detail_transaction');
    }

    public function requestRefund(){
        return $this->belongsTo('App\RequestRefund', 'id_request_refund');
    }
}
