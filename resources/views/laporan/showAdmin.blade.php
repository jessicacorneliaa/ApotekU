
@extends('layout.conquer')

@section('title', 'Cart')

@section('content')
<h1>Detail Riwayat Transaksi</h1><br>
<table id="cart" class="table table-hover table-condensed">
    <thead>
    <tr>
        <th style="width:8%" class="text-center">No</th>
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
        $no = 0;
    ?>
    @foreach($transaksi->obat as $details)
    <?php
        $jml+= $details->pivot->jumlah;
        $total+= $details->pivot->jumlah* $details->pivot->harga;
        $no+=1;
    ?>
    <tr>
        <td data-th="No" class="text-center">{{$no}}</td>
        <td data-th="Product">
            <div class="row">
                <div class="col-sm-3 hidden-xs"><img height="50px" src="{{ asset('images/'.$details['image']) }}" alt="..." class="img-responsive"/></div>
                <div class="col-sm-9">
                    <h4 class="nomargin">{{$details->generic_name}} {{$details->form}}</h4>
                </div>
            </div>
        </td>
        <td data-th="Price" class="text-center">Rp {{number_format($details->price,2)}}</td>
        <td data-th="Quantity" class="text-center">
            {{$details->pivot->jumlah}}
        </td>
        <td data-th="Subtotal" class="text-center">Rp {{number_format($details->pivot->harga* $details->pivot->jumlah,2)}}</td>
    </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="3" style="text-align:right">Total: </td>
        <td class="text-center"><strong>{{$jml}}</strong></td>
        <td class="text-center"><strong>Rp {{number_format($total,2)}}</strong></td>
    </tr>
    </tfoot>
</table>
@endsection