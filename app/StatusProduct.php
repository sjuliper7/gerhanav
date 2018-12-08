<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusProduct extends Model
{
    protected $fillable = [
        'name',
    ];

    public function products(){
        return $this->hasMany('App\Product','id_status');
    }
}
