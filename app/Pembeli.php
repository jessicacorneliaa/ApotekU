<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    protected $fillable = [
        'user_id', 'name', 'address', 'telepon',
    ];

    public $timestamps = false;

}
