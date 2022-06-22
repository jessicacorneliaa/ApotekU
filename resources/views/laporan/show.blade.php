@extends('layout.medion')

@section('title', 'Cart')

@section('content')

    
<div class="container">
    <h1>Detail Riwayat Transaksi</h1><br>
    <table id="cart" class="table table-hover table-condensed">
        <thead>
        <tr>
            <th style="width:50%">Product</th>
            <th style="width:10%" class="text-center">Price</th>
            <th style="width:8%" class="text-center">Quantity</th>
            <th style="width:22%" class="text-center">Subtotal</th>
        </tr>
        </thead>
        <tbody>
        <?php
            $jml= 0;
            $total= 0;
        ?>
        @foreach($transaksi->obat as $details)
        <?php
            $jml+= $details->pivot->harga;
            $total+= $details->pivot->jumlah* $details->pivot->harga;
        ?>
        <tr>
            <td data-th="Product">
                <div class="row">
                    <div class="col-sm-3 hidden-xs"><img height="50px" src="{{ asset('images/'.$details['image']) }}" alt="..." class="img-responsive"/></div>
                    <div class="col-sm-9">
                        <h4 class="nomargin">{{$details->generic_name}} {{$details->form}}</h4>
                    </div>
                </div>
            </td>
            <td data-th="Price" class="text-center">{{$details->price}}</td>
            <td data-th="Quantity" class="text-center">
                {{$details->pivot->jumlah}}
            </td>
            <td data-th="Subtotal" class="text-center">{{$details->pivot->harga* $details->pivot->jumlah}}</td>
        </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr class="visible-xs">
            <td colspan="2" style="text-align:right">Total: </td>
            <td class="text-center"><strong>{{$jml}}</strong></td>
            <td class="text-center"><strong>{{$total}}</strong></td>
        </tr>
        </tfoot>
    </table>
</div>
@endsection