<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public function obat()
    {
        return $this->belongsToMany('App\Obat', 'transaksi_obats', 'transaksi_id', 'obat_id')->withPivot('jumlah','harga');
    }
}
