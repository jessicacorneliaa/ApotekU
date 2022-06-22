<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ObatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'ObatController@front_index')->name('index');
Route::get('/daftar-obat', 'ObatController@front_obat')->name('daftarobat');


Route::middleware(['auth'])->group(function(){

    // cart
    Route::get('add-to-cart/{id}', 'ObatController@addToCart');
    Route::get('checkout', 'ObatController@checkout');
    Route::get('submit-checkout', 'ObatController@submitCheckout');

    // obat
    Route::resource('obat','ObatController');

    // pembeli
    Route::resource('pembeli','PembeliController');

    // kategori 
    Route::resource('kategori','KategoriController');

    // Transaksi
    Route::resource('transaksi', 'TransaksiController');
    Route::get('pembeli-dengan-transaksi-terbanyak', 'TransaksiController@laporanPembeliTerbanyak');

    Route::get('obat-terlaris', 'TransaksiController@laporanObatTerlaris');
});