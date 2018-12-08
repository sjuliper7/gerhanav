<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusTransaction extends Model
{
    protected $fillable = [
        'name'
    ];

    public function transactions(){
        return $this->hasMany('App\Transaction','id_status');
    }

}
