@extends('layout.conquer')
@section('content')
<h2>Daftar Pembeli</h2> 
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
      <tr>
        <th>ID</th>
        <th>Nama Pembeli</th>
        <th>Alamat Pembeli</th>
        <th>No tlp</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @php $no = 1; @endphp
        @foreach($data as $d)
        <tr>
            <td>{{$no++}}</td>
            <td>{{ $d -> name}}</td>
            <td>{{ $d -> address}}</td>
            <td>{{ $d -> telepon}}</td>
            <td> <a href = "{{ route('pembeli.edit',$d ->user_id)}}" 
                  class = 'btn btn-s btn-info'><span class="bi bi-pencil-square"></span></a>
            </td>
            <td>
                  <form method="POST" action="{{ route('pembeli.destroy', $d->user_id) }}">
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


