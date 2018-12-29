@extends('admin.layouts.index')

@section('title', '| Product')

@section('content')

    <style>
        .circle {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            font-size: 10px;
            color: #fff;
            line-height: 35px;
            text-align: center;
            background: #df3b3b;
            margin-top: -200px;
            margin-left: 10px;
            position: absolute;
        }
    </style>

    <div class="content">
        <div class="container-fluid">
            <div class="col-lg-offset-0 col-lg-11">

                <div class="row" style="margin-left:-2em">
                    <div class="col-sm-2">
                        <img src="{{asset('images/shop.png')}}" class="img-thumbnail" alt="...">
                    </div>
                    <div class="col-sm-7">
                        <h3 style="color: #8b0000">{{Auth::user()->store->store_name}}</h3>
                        <h5>{{Auth::user()->store_email}}</h5>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-2">
                                    <img class="" src="{{asset('images/location_icon.png')}}"style="max-height: 80%;max-width: 80%;margin-left: 0em">
                                </div>
                                <div class="col-sm-6">
                                    <h5 style="margin-top: 5px;margin-left: -10px">{{Auth::user()->store->store_address}}</h5>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top:1em">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#nav-product">Produk</a></li>
                        <li><a data-toggle="tab" href="#nav-transaction">List Transaksi</a></li>
                        <li><a data-toggle="tab" href="#nav-review">Ulasan</a></li>
                        <li><a data-toggle="tab" href="#nav-promotion">Promo</a></li>
                    </ul>

                    <div class="tab-content">
                        <div id="nav-product" class="tab-pane fade in active">
                            <div style="margin-top: 1em">
                                <a href="{{route('products.create')}}" class="btn btn-success">Create Product</a>
                            </div>

                            @foreach($products as $product)
                                <?php
                                $images = json_decode($product->images);
                                ?>
                                <div class="col-lg-3 col-xs-5" style="margin-top: 1em;">
                                    <!-- small box -->

                                        <img class="card-img-top center-block" src="{{ asset('images/'.$images[0])  }}" style="width:150px;height:150px;margin-bottom: 10px; padding: 10px; object-fit: cover;" alt="Card image cap" />

                                        <div class="card-body" >
                                            <h5 class="card-title text-center">{{$product->name}}</h5>
                                            @if($product->discount !=0)
                                                <div class="card-img-top center-block circle" ">{{$product->discount}}%</div>
                                                <p class="card-text" style="text-align: center;  font-size: 13px; color: #262323 " >Rp.{{number_format($product->price-($product->price*$product->discount/100)),0}}<span style="margin-left: 5px;text-decoration: line-through;color:red; font-size: 11px;">Rp.{{number_format($product->price)}}</span></p>
                                                <div style="padding: 10px; ">
                                                    <a href="{{ route('products.show', $product->id ) }}" class="btn btn-info btn-block">Detail</a>
                                                </div>
                                            @else
                                                <p class="card-text" style="text-align: center;  font-size: 13px; color: #262323 " >Rp {{number_format($product->price)}}</p>
                                                <div style="padding: 10px">
                                                    <a href="{{ route('products.show', $product->id ) }}" class="btn btn-info btn-block">Detail</a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div id="nav-transaction" class="tab-pane fade">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th scope="col">#Kode Transaksi</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga Satuan</th>
                                    <th scope="col">Jumlah Barang</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Status Transaksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($detailTransactions as $detailTransaction)
                                    <tr>
                                        <td scope="row">#{{$detailTransaction->transaction->order_id}}</td>
                                        <?php
                                            $images = json_decode($detailTransaction->product->images);
                                        ?>
                                        <td><img src="{{ asset('images/'. $images[0]) }}" style="height: 55px; width: 50px; "> </td>
                                        <td>{{$detailTransaction->product->name}}</td>
                                        <td>Rp {{number_format($detailTransaction->product->price)}}</td>
                                        <td>{{number_format($detailTransaction->quantity)}}</td>
                                        <td>Rp {{number_format($detailTransaction->sub_total_price)}}</td>
                                        <td class="text-success">{{$detailTransaction->transaction->status->name}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div id="nav-review" class="tab-pane fade">
                            <center><h4>Belum ada Ulasan..</h4></center>
                        </div>

                        <div id="nav-promotion" class="tab-pane fade">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Manage Products")
            $('#product').addClass("active")
        });
    </script>

@endsection
