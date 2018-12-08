@extends('layouts.index-for-detail')

@section('content')
    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">List Transaksi</h2>
        </div>
    </div>

    <!-- Shop -->

    <div class="shop">
        <div class="container">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#Kode Transaksi</th>
                    <th>Nama Produk</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah Barang</th>
                    <th>Total Harga</th>
                    <th>Status Transaksi</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($detailTransactions as $detailTransaction)
                    <tr>
                        <td>#{{$detailTransaction->transaction->order_id}}</td>
                        <td>{{$detailTransaction->product->name}}</td>
                        <td>{{$detailTransaction->product->price}}</td>
                        {{--<td>{{$detailTransaction->product->images}}</td>--}}
                        {{--<td><img src="{{ asset('images/'. $detailTransaction->product->images) }}" style="height: 55px; width: 50px; "> </td>--}}
                        <td>{{$detailTransaction->quantity}}</td>
                        <td>{{$detailTransaction->sub_total_price}}</td>
                        <td class="text-success">{{$detailTransaction->transaction->status->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
