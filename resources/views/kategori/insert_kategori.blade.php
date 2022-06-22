@extends('layout.conquer')

@section('content')
  <!-- BEGIN PAGE HEADER-->
  <h3 class="page-title">
			Form Tambah Kategori
  </h3>
  <!-- END PAGE HEADER-->
<!-- <div class="container "> -->
 
<div class="portlet">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-reorder"></i> Isikan data kategori obat
        </div>
        <div class="tools">
            <a href="" class="collapse"></a>
        </div>
    </div>
    <div class="portlet-body form">
        <form method="POST" action="{{route('kategori.store')}}">
            @csrf
            <div class="form-body">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input type="text" class="form-control" name="nama" placeholder="Isikan nama kategori">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="3"></textarea>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-info">Submit</button>
                <a href="{{ route('kategori.index') }}" class="btn btn-default">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
