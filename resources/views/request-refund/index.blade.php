@extends('layouts.index-for-cart')

@section('content')
    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-offset-0">
                    <div class="cart_container">
                        @foreach($requestRefunds as $requestRefund)
                            <div class="cart_items">
                                <ul class="cart_list">
                                    <li class="cart_item clearfix">
                                        <div class="container">
                                            <table class="table" style="margin-bottom: -10px;margin-top: -10px">
                                                <tr>
                                                    <td class="text-center"  style="border-top: none;">Gambar Produk</td>
                                                    <td class="text-center" style="border-top: none;" width="15%">Nama Produk</td>
                                                    <td class="text-center" style="border-top: none;" width="20%">Jumlah Barang</td>
                                                    <td class="text-center" style="border-top: none;" width="15%">Total Harga</td>
                                                    <td class="text-center" style="border-top: none;" width="25%">Alasan Pengembalian</td>
                                                    <td class="text-center" style="border-top: none;" width="15%">Status</td>
                                                    <td class="text-center" style="border-top: none;" width="20%">Aksi</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">
                                                        <img src="{{url('/images/'.$requestRefund->bukti_barang_image)}}" class="rounded mx-auto d-block"  style="max-height: 150px;max-width: 100px; margin-right: 10px"">
                                                    </td>
                                                    <td class="text-center">{{$requestRefund->product->name}}</td>
                                                    <td class="text-center">{{$requestRefund->detailTransaction->quantity}}</td>
                                                    <td class="text-center">{{$requestRefund->detailTransaction->sub_total_price}}</td>
                                                    <td class="text-center">{{$requestRefund->alasan_pengembalian}}</td>
                                                    <td class="text-center">{{$requestRefund->statusRefund->status}}</td>
                                                    <td class="text-center">
                                                        <a href="{{url('/detail-request-refund/'.$requestRefund->id)}}" type="button" class="btn btn-success"style="background-color: #8b0000">Lihat</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
