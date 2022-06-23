@extends('layout.conquer')
@section('content')

<style>
    .center, th {text-align: center;}
</style>

<h2>Daftar Obat</h2> 
<div>
  @if(session('status')=="Data berhasil dihapus")
  <div class="alert alert-success">{{session('status')}}</div>
  @elseif((session('status')=="Data tidak dapat dihapus"))
  <div class="alert alert-danger">{{session('status')}}</div>
  @endif

  @if(session('error'))
  <div class="alert alert-danger">{{session('error')}}</div>
  @endif
</div>
<div class="modal fade" id="disclaimer" tabindex="-1" role="basic" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">DISCLAIMER</h4>
        </div>
        <div class="modal-body">
          Pictures shown are for illustration purpose only.Actual product may vary due to product enhancement.
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
   </div>
</div>
  <table class="table table-hover">
    <a href="{{ route('obat.create') }}" class="btn btn-primary" >+ Tambah</a>
    <thead>
      <tr>
        <th>No.</th>
        <th>ID Obat</th>
        <th>Nama Obat</th>
        <th>Medicines Form</th>
        <th>Harga</th>
        <th>Nama Kategori</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach($data as $d)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{$d->id}}</td>
            <td>{{ ucfirst($d -> nama_obat)}}</td>
            <td>{{ $d -> restriction_formula}}</td>
            <td>Rp {{ number_format($d -> harga,2)}}</td>
            <td>{{ ucwords(strtolower($d -> nama_kategori))}}</td>
            <td> <a href = "{{ route('obat.edit',$d ->id)}}" 
                  class = 'btn btn-s btn-info'><span class="bi bi-pencil-square"></span></a>
            </td>
            <td>
                  <form method="POST" action="{{url('obat/'.$d->id)}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-s" onclick="if(!confirm('are you sure to delete this record ?')) return false;"><span class="bi bi-trash"></span></button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection


