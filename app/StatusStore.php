<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusStore extends Model
{
    protected $fillable = [
        'name',
    ];

    public function storeRequests(){
        return $this->hasMany('App\RequestStore','id_status');
    }
}
