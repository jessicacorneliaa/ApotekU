@extends('layout.conquer')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>List Pembeli dengan Transaksi Terbanyak</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <div class="card">
            <table class="table table-bordere">
                <thead>
                    <tr>
                        <th>ID Pembeli</th>
                        <th>Nama Pembeli</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th>Total Transaksi Pembelian</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($laporans as $laporan)
                    <tr>
                        <td>{{$laporan->user_id}}</td>
                        <td>{{$laporan->name}}</td>
                        <td>{{$laporan->address}}</td>
                        <td>{{$laporan->telepon}}</td>
                        <td>Rp {{ number_format($laporan-> totalHarga)}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</section>
@endsection