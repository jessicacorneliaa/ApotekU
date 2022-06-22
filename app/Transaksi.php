<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    public $timestamps = false;

    public function obat()
    {
        return $this->belongsToMany('App\Obat', 'transaksi_obats', 'transaksi_id', 'obat_id')->withPivot('jumlah','harga');
    }

    public function insertProduct($cart, $user){
        $total=0;
        foreach($cart as $id=> $detail){
            $total+= $detail['price']* $detail['quantity'];
            $this->obat()->attach($id, ['jumlah'=> $detail['quantity'], 'harga'=> $detail['price']]);
        }
        return $total;
    }
}
