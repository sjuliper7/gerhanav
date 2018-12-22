<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusRefund extends Model
{
    protected $fillable = [
        'status',
        ];

    public function requestRefund(){
        return $this->hasOne('App\RequestRefund','id_status_refund');
    }
}
