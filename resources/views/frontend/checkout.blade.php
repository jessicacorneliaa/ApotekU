@extends('layout.medion')

@section('title', 'Cart')

@section('content')

<div class="container">
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:12%" class="text-center">Price</th>
            <th style="width:5%" class="text-center">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
        </tr>
        </thead>
        <tbody>
        @if(session('cart'))
        <?php
            $jml= 0;
            $total= 0;
        ?>
         @foreach(session('cart') as $id=>$details)
                    <?php
                        $jml+= $details['quantity'];
                        $total+= $details['quantity'] * $details['price'];
                    ?>
        <tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img height="50px" src="{{ asset('images/'.$details['image']) }}" alt="..." class="img-responsive"/></div>
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{$details['name']}}</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price" class="text-center">Rp {{number_format($details['price'],2)}}</td>
            <td data-th="Quantity" class="text-center">
                {{$details['quantity']}}
            </td>
            <td data-th="Subtotal" class="text-center">Rp {{number_format($details['price']* $details['quantity'],2)}}</td>
        </tr>
        @endforeach
        @endif
        </tbody>
        <tfoot>
        <tr>
            <td colspan="2" style="text-align:right">Total: </td>
            <td class="text-center"><strong>{{$jml}}</strong></td>
            <td class="text-center"><strong>Rp {{number_format($total,2)}}</strong></td>
        </tr>
        <tr class="hidden-xs">
            <td>
                <a href="{{ url('submit-checkout') }}" class="btn btn-dangerr" style="background-color: #dc3545; border-color: #dc3545;"><i class="fa fa-check"></i> Checkout</a>
            </td>
            <td colspan="4" class="hidden-xs"></td>
            
            
        </tr>
        </tfoot>
    </table>
    </div>


@endsection