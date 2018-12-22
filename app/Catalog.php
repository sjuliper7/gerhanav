<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Catalog extends Model
{
    protected $fillable = [
        'id_product','isActive'
    ];

    public function product(){
        return $this->belongsTo('App\Product','id_product');
    }
}
