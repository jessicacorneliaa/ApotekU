@extends('layout.medion')

@section('content')
<div class="container">
    <h1>Riwayat Transaksi</h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Waktu Transaksi</th>
                <th>Total</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transaksi as $t)
            <tr>
                <td>{{$t->id}}</td>
                <td>{{$t->tanggal}}</td>
                <td>Rp {{number_format($t->total, 0, ', ','.')}}</td>
                <td>
                    <a href="{{ route('transaksi.show', $t->id) }}" class="btn btn-info btn-sm">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection