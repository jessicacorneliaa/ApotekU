@extends('layout.conquer')

@section('content')
    <h1>Transaksi Semua Pembeli</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Transaksi</th>
                <th>Waktu Transaksi</th>
                <th>ID Pembeli</th>
                <th>Total</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $nomor=1;
            ?>
            @foreach($transaksi as $t)
                @if($t->total != null)
                    <tr>
                        <td>{{$nomor++}}</td>
                        <td>{{$t->id}}</td>
                        <td>{{$t->tanggal}}</td>
                        <td>{{$t->pembeli_id}}</td>
                        <td>Rp {{number_format($t->total, 0, ', ','.')}}</td>
                        <td>
                            <a href="{{ route('transaksi.show', $t->id) }}" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection