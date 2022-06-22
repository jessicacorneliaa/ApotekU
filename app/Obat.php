<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    public $timestamps = false;

    public function kategori(){
        return $this->belongsTo('App\Kategori', 'kategori_id');
    }
    
    public function transaksi(){
        return $this->belongsToMany('App\Transaksi','transaksi_obats', 'obat_id', 'transaksi_id')->withPivot('jumlah','harga');
    }
}
