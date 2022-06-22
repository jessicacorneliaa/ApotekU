<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $transaksi= DB::table('transaksis')
                        ->select('id', 'tanggal', 'total')
                        ->where('pembeli_id', '=', Auth::user()->id)
                        ->get();
        return view('home', compact('transaksi'));
    }
}
