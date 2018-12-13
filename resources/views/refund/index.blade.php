@extends('layouts.index-for-cart')

@section('content')
    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-offset-0">
                    <div class="cart_container">
                        @foreach($refunds as $refund)
                            <div class="cart_items">
                                <ul class="cart_list">
                                    <li class="cart_item clearfix">
                                        <div class="container">
                                            <table class="table" style="margin-bottom: -10px;margin-top: -10px">
                                                <tr>
                                                    <td class="text-center" style="border-top: none;" width="15%">Nama Produk</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-center">#{{$refund->id_product}}</td>
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
