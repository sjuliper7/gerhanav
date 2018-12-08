<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    protected $fillable = [
        'name',
    ];

    public function products(){
        return $this->hasMany('App\Product','id_category');
    }

}
