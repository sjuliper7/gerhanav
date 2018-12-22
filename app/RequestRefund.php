<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestRefund extends Model
{
    protected $fillable = [
        'id_user', 'id_product', 'id_detail_transaction', 'id_status_refund', 'alasan_pengembalian',
        'keterangan', 'bukti_barang_image',
    ];

    public function user(){
        return $this->belongsTo('App\User','id_user');
    }

    public function product(){
        return $this->belongsTo('App\Product','id_product');
    }

    public function statusRefund(){
        return $this->belongsTo('App\StatusRefund', 'id_status_refund');
    }

    public function detailTransaction(){
        return $this->belongsTo('App\DetailTransaction', 'id_detail_transaction');
    }

    public function konfirmasiRefund(){
        return $this->hasOne('App\KonfirmasiRefund','id_request_refund');
    }

    public function refunds(){
        return $this->hasOne('App\Refund','id_request_refund');
    }
}
