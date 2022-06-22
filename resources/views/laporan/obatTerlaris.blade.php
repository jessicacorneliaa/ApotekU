@extends('layout.conquer')

@section('content')

<style>
    .center, th {text-align: center;}
</style>

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1>Daftar Obat terlaris</h1>
            </div>
        </div>
    </div>
</section>
<section class="content">
<div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <div class="card">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Obat</th>
                        <th>Nama Obat</th>
                        <th>Jumlah terjual</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($obat_terlaris as $ot)
                        @if($arr_terlaris[$ot->id] != 0)
                            <tr>
                                <td class="center">{{ $no++ }}</td>
                                <td class="center">{{$ot->id}}</td>
                                <td>{{ucfirst($ot->generic_name)}}</td>
                                <td class="center">{{$arr_terlaris[$ot->id]}}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
</section>
@endsection