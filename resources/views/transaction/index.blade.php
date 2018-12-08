@extends('layouts.index-for-cart')

@section('content')
    <!-- Single Product -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-offset-0">
                    <div class="cart_container">
                        @foreach($transactions as $transaction)
                            <a href="{{url('transactions/'.$transaction->id.'/show')}}" style="color: black">
                                <div class="cart_items">
                                    <ul class="cart_list">
                                        <li class="cart_item clearfix">
                                            <div class="container">
                                                <table class="table" style="margin-bottom: -10px;margin-top: -10px">
                                                    <tr>
                                                        <td class="text-center" style="border-top: none;" width="15%">Nomor Order</td>
                                                        <td class="text-center" style="border-top: none;" width="15%">Total Price</td>
                                                        <td class="text-center" style="border-top: none;" width="18%">Biaya Pengiriman</td>
                                                        <td class="text-center" style="border-top: none;" width="20%">Estimasi Pengiriman</td>
                                                        <td class="text-center" style="border-top: none;" width="15%">Total Barang</td>
                                                        <td class="text-center" style="border-top: none;" width="25%">Status</td>
                                                        <td class="text-center" style="border-top: none;" width="25%">Resi</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">#{{$transaction->order_id}}</td>
                                                        <td class="text-center">Rp {{number_format($transaction->total_price)}}</td>
                                                        <td class="text-center">Rp {{number_format($transaction->shipment_fee)}}</td>
                                                        <td class="text-center">{{$transaction->shipment_etd}} Hari</td>
                                                        <td class="text-center">{{count($transaction->detailTransactions)}}</td>
                                                        <td class="text-danger text-center">{{$transaction->status->name}}</td>
                                                        <td class="text-success text-center">{{$transaction->shipment_number}}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </a>
                        @endforeach
                    </div>
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
