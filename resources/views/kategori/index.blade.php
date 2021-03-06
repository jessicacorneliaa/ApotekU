@extends('layout.conquer')
@section('content')

<style>
    .center, th {text-align: center;}
</style>

<h2>Daftar Kategori</h2> 
<div>
  @if(session('status'))
  <div class="alert alert-success">{{session('status')}}</div>
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
    <thead>
        <a href="{{ route('kategori.create') }}" class="btn btn-primary" >+ Tambah</a>
      <tr>
        <th>No</th>
        <th>ID Kategori</th>
        <th>Nama Kategori</th>
        <th>Deskripsi</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php $no = 1; @endphp
        @foreach($kategoridata as $d)
        <tr>
            <td>{{$no++}}</td>
            <td>{{ ucwords(strtolower($d -> id))}}</td>
            <td>{{ ucwords(strtolower($d -> nama))}}</td>
            <td>{{ $d -> deskripsi}}</td>
            <td> <a href = "{{ route('kategori.edit',$d ->id)}}" 
                class = 'btn btn-s btn-info'><span class="bi bi-pencil-square"></span></a>
            </td>
            <td>
              <form method="POST" action="{{ route('kategori.destroy', $d->id) }}">
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


