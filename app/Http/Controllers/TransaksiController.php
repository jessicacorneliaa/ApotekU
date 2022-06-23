<?php

namespace App\Http\Controllers;

use App\Obat;
use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("laporan.pembeliTransaksiTerbanyak");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        if(Auth::user()->pembeli){
            return view('laporan.show', compact('transaksi'));
        }
        else{
            return view('laporan.showAdmin', compact('transaksi'));
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function laporanPembeliTerbanyak(){
        $this->authorize('check-admin');
        
        // Menghitung jumlah total semua transaksi tiap pembeli
        // select p.user_id, p.name, p.address, p.telepon, sum(t.total) as totalHarga
        // from transaksis t
        // INNER JOIN pembelis p on p.user_id=t.pembeli_id
        // GROUP by t.pembeli_id
        // ORDER BY totalHarga ASC 
        // LIMIT 3;
        
        $laporans= DB::table('transaksis as t')
                    ->select('p.user_id', 'p.name', 'p.address', 'p.telepon', DB::raw('SUM(t.total) as totalHarga'))
                    ->join('pembelis as p', 't.pembeli_id', "=", 'p.user_id')   
                    ->groupBy('p.user_id')     
                    ->orderBy('totalHarga', 'DESC')                          
                    ->limit(3)
                    ->get();
        return view('laporan.pembeliTransaksiTerbanyak', compact('laporans'));
    }

    public function laporanObatTerlaris(){
        $this->authorize('check-admin');
        //Ambil semua data di masternya -> obat dan transaksi
        $obat = Obat::all();
        $transaksi = Transaksi::all();

        $arr_terlaris = [];

        //Masukkan data master obat dan transaksi pada 1 array
        //Foreach berdasarkan obat karena obat yang utama(dominan)
        //Beri key pada array dengan id obat, valuenya jumlah obat tsb terjual
        foreach($obat as $o) $arr_terlaris[$o->id] = $o->transaksi()->sum('jumlah');

        //Sort isi array berdasarkan valuenya secara desc
        arsort($arr_terlaris);
        //Ambil key 5 data dari array yang sudah diurutkan, nantinya digunakan untuk menampilkan data by id(key) tsb
        $terlaris = array_slice(array_keys($arr_terlaris), 0,5, true);

        //Masukkan daftar obat yang sesuai dengan key pada array $terlaris tadi ke sebuah array
        $obat_terlaris = [];
        foreach($terlaris as $idx => $val){
            $obat = Obat::find($val);
            array_push($obat_terlaris, $obat);
        }
        // dd($obat_terlaris);
        return view('laporan.obatTerlaris', compact('obat_terlaris', 'arr_terlaris'));
    }

    public function transaksiSemuaPembeli(){
        $this->authorize('check-admin');
        $transaksi=Transaksi::all();
        return view('laporan.transaksiSemuaPembeli', compact('transaksi'));
    }
}
