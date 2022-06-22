@extends('layout.conquer')

@section('content')
  <!-- BEGIN PAGE HEADER-->
  <h3 class="page-title">
			Form Tambah Pembeli
  </h3>
  <!-- END PAGE HEADER-->
<!-- <div class="container "> -->
 
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Isikan data pembeli
        </div>
        <div class="tools">
            <a href="" class="collapse"></a>
        </div>
    </div>
    <div class="portlet-body form">
        <form method="POST" action="{{route('pembeli.store')}}">
            @csrf
            <div class="form-body">
                <div class="form-group">
                    <label>Nama Pembeli</label>
                    <input type="text" class="form-control" name="nama" placeholder="Isikan nama kategori">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Isikan alamat">
                </div>
                <div class="form-group">
                    <label>No tlp</label>
                    <input type="text" class="form-control" name="telepon" placeholder="Isikan nomor hp">
                </div>
                
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ route('pembeli.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
