<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KonfirmasiRefund extends Model
{
    protected $fillable = [
        'id_request_refund', 'alasan_penolakan', 'no_hp_yang_dihubungi',
        ];

    public function requestRefund(){
        return $this->belongsTo('App\RequestRefund','id_request_refund');
    }
}
