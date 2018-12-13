<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    protected $fillable = [
        'alasan', 'keterangan', 'id_status_refund', 'id_product', 'id_user', 'no_rekening_tujuan', 'atas_nama',
        'jenis_bank', 'jumlah', 'kurir_pengiriman', 'alasan_penolakan',
        ];

    public function product(){
        return $this->belongsTo('App\Product','id_product');
    }

    public function status(){
        return $this->belongsTo('App\StatusRefund', 'id_status_refund');
    }

    public function user(){
        return $this->belongsTo('App\User','id_user');
    }
}
