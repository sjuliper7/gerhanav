@extends('layouts.index-for-cart')

@section('content')
    <!-- Single Product -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart_container">
                        @foreach($detailTransactions as $detailTransaction)
                            {{--<a href="{{url('transactions/'.$transaction->id.'/show')}}">--}}
                                <div class="cart_items col-lg-12">
                                    <ul class="cart_list">
                                        <li class="cart_item clearfix">
                                            <table class="table" style="margin-bottom: -10px;margin-top: -10px">
                                                <tr>
                                                    <td class="text-center"  style="border-top: none;" width="15%">Nomor Order</td>
                                                    <td class="text-center"  style="border-top: none;">Gambar Produk</td>
                                                    <td class="text-center"  style="border-top: none;" width="20%">Nama Product</td>
                                                    <td class="text-center"  style="border-top: none;" width="18%">Nama Toko</td>
                                                    <td class="text-center" style="border-top: none;" width="20%">Jumlah Barang</td>
                                                    <td class="text-center" style="border-top: none;" width="15%">Total Barang</td>
                                                    <td class="text-center" style="border-top: none;" width="25%">Comment</td>
                                                    <td class="text-center" style="border-top: none;" width="20%">Aksi</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center" >#{{$detailTransaction->transaction->order_id}}</td>
                                                    <?php
                                                    $images = json_decode($detailTransaction->product->images);
                                                    ?>
                                                    <td class="text-center" ><img src="{{ asset('images/'.$images[0]) }}" style="max-height: 150px;max-width: 100px; margin-right: 10px" alt=""></td>
                                                    <td class="text-center" >{{$detailTransaction->product->name}}</td>
                                                    <td class="text-center" >{{$detailTransaction->product->store->store_name}}</td>
                                                    <td class="text-center" >Rp {{number_format($detailTransaction->sub_total_price)}}</td>
                                                    <td class="text-center" >{{$detailTransaction->quantity}}</td>
                                                    <td class="text-center" class="text-danger">{{$detailTransaction->comment}}</td>
                                                    <td class="text-center">
                                                        <a href="{{url('request-refund/'.$detailTransaction->product->id)}}" type="button" class="btn btn-success"style="background-color: #8b0000">Kembalikan Barang</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </li>
                                    </ul>
                                </div>
                            {{--</a>--}}
                        @endforeach
                            @if($detailTransaction->transaction->status->name === "Menunggu Verifikasi" || $detailTransaction->transaction->status->name === "Menunggu Pembayaran")
                                <div class="cart_buttons">
                                    {{--<a href="/" button type="button" class="btn btn-danger"style="background-color: #FFFFFF;color: #000000">Batal</a>--}}
                                    <a href="{{url('upload-payment/'.$detailTransaction->transaction->order_id)}}" type="button" class="btn btn-success"style="background-color: #8b0000">Bayar</a>
                                </div>
                            @else

                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {

        });
    </script>

@endsection
