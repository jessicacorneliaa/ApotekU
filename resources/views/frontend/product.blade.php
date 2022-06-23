@extends('layout.medion')

@section('title', 'ApotikU')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<!-- discount section -->
<div>
    <section class="discount_section">
      <div class="container-fluid ">
        <div class="row ">
          <div class="col-lg-3 col-md-5 offset-md-2">
            <div class="detail-box">
              <h2>
                Welcome to<br>
                <span>
                  ApotekU
                </span>
              </h2>
            </div>
          </div>
          <div class="col-lg-7 col-md-5">
            <div class="img-box">
              <img src="{{ asset('images/medicines.jpg') }}">
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end discount section -->
<div class="health_carousel-container"><br>
  <h2 class="text-uppercase">
    Daftar Obat
  </h2>
  <div class="carousel-wrap layout_padding2">
    <div class="owl-carousel owl-2">
    @foreach($products as $p)
      <div class="item">
        <div class="box">
          <div class="btn_container">
          @can('add-cart-permission')
            <a href="{{url('add-to-cart/'.$p->id)}}">
              Add to cart
            </a>
          @endcan
          </div>
         
          <div class="img-box">
            <img src="{{asset('images/'.$p->image)}}" height="100px" width="100px">
          </div>
          <div class="detail-box">
            <div class="text">
              <h6>{{$p->generic_name}}</h6>
            </div>
            <div class="text">
              <h6 class="price text-align-right">Rp. {{number_format($p->price,2)}}</h6>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>
</div>
<div class="d-flex justify-content-center">
  <a href="{{ route('daftarobat') }}">
    See more
  </a>
</div>
@endsection