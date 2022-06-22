@extends('layout.conquer')

@section('content')
  <!-- BEGIN PAGE HEADER-->
  <h3 class="page-title">
			Form Ubah Pembeli
  </h3>
  <!-- END PAGE HEADER-->
<!-- <div class="container "> -->
 
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Ubah data pembeli 
        </div>
        <div class="tools">
            <a href="" class="collapse"></a>
        </div>
    </div>
    <div class="portlet-body form">
        @foreach($data as $d)
        <form method="POST" action="{{url('pembeli/'.$d->user_id)}}">
            @csrf
            @method('PUT')
            <div class="form-body">
                <div class="form-group">
                    <label>Nama Pembeli</label>
                    <input type="text" class="form-control" name="nama" placeholder="Isikan nama pembeli" value="{{$d->name}}">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Isikan alamat" value="{{$d->address}}">
                </div>
                <div class="form-group">
                    <label>No tlp</label>
                    <input type="text" class="form-control" name="telepon" placeholder="Isikan no telepon" value="{{$d->telepon}}">
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ route('pembeli.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
        @endforeach
    </div>
</div>
@endsection
