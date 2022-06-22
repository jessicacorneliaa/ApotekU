@extends('layout.medion')

@section('title', 'Products')

@section('content')
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<div class="container products">
  <h2 class="text-uppercase mb-5">
    Daftar Semua Obat
  </h2>
  <br>
    <div class="row">
        @foreach($products as $p)
        <div class="col-xs-12 col-sm-6 col-md-3 pb-5 border">
            <table style="width: 100%; height: 100%;">
                <div class="thumbnail">
                    <tr style="width: 175px; height: 175px;">
                        <td>
                            <center>                                
                                <img src="{{asset('images/'.$p->image)}}" alt="picture of {{ $p->generic_name }}" width="175" height="175" style="object-fit: contain">
                            </center>
                        </td>
                    </tr>
                </div>
                <div class="caption">
                    <tr>
                        <td>
                            <h4>{{$p->generic_name}}</h4>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <h5>{{$p->form }}</h5>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            @if($p->description=="")
                            <p>No description</p>
                            @else
                            <p>{{$p->description}}</p>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p><strong>Price: </strong> Rp. {{ number_format($p->price, 2) }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <form action="{{url('add-to-cart/'.$p->id)}}" method="GET">
                                @csrf
                                <div class="row">
                                    <span style="margin:auto">
                                        <input type="number" name="quantity" value="1" min="1" style="width:50px">
                                        <button type="submit" class="btn-holder" value="Add To Cart" style="display:inline">Add to cart</button>
                                    </span>
                                </div>
                            </form>
                        </td>
                    </tr>
                </div>
            </table>
        </div>
        @endforeach
    </div>
</div>
@endsection