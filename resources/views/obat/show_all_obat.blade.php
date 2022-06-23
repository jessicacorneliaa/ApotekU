@extends('layout.conquer')
@section('content')
<h2>Show All Medicines</h2> 
  <table class="table table-hover">
    <thead>
      <tr>
        <th>No.</th>
        <th>Gambar</th>
        <th>Nama Obat</th>
        <th>Harga</th>
        <th>Nama Kategori Obat</th>
      </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr>
            <td>{{ $d -> id}}</td>
            <td>{{ $d -> gambar}}</td>
            <td>{{ $d -> nama_obat}}</td>
            <td>{{ number_format($d -> harga,2)}}</td>
            <td>{{ $d -> nama_kategori}}</td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection