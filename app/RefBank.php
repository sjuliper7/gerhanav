<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefBank extends Model
{
    protected $fillable = [
        'account_vendor', 'account_number',
    ];
}
