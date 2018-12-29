@extends('layouts.index-for-listing')

@section('content')
    <div class="shop">
        <div class="container">
            <div class="row">
                @if(count($products) != 0)
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-sm-2"style="margin-left:-1em">
                                <img src="{{asset('images/shop.png')}}" class="img-thumbnail" alt="...">
                            </div>
                            <div class="col-sm-7">
                                <h3 style="color: #8b0000">{{$store->store_name}}</h3>
                                <h5>{{$store->store_email}}</h5>
                                <div class="col-sm-8">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <img class="" src="{{asset('images/location_icon.png')}}"style="max-height: 80%;max-width: 80%;margin-left: 0em">
                                        </div>
                                        <div class="col-sm-6">
                                            <h5 style="margin-top: 5px;margin-left: -10px">{{$store->store_address}}</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Shop Content -->
                        <nav style="margin-top: 1em">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-item nav-link active" id="nav-product-tab" data-toggle="tab" href="#nav-product" role="tab" aria-controls="nav-product" aria-selected="true">Produk</a>
                                <a class="nav-item nav-link" id="nav-transaction-tab" data-toggle="tab" href="#nav-transaction" role="tab" aria-controls="nav-transaction" aria-selected="false">Daftar Transaksi</a>
                                <a class="nav-item nav-link" id="nav-review-tab" data-toggle="tab" href="#nav-review" role="tab" aria-controls="nav-review" aria-selected="false">Ulasan</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-product" role="tabpanel" aria-labelledby="nav-product-tab">
                                <a href="{{url('owner-products/create')}}">
                                    <button type="button" class="btn btn-primary" style="margin-top: 1em;background-color: #8b0000;" >Tambah Produk</button>
                                </a>
                                <div class="product_grid">
                                @foreach($products as $product)
                                    <?php
                                    $images = json_decode($product->images);
                                    ?>
                                    <!-- Product Item -->
                                        <div class="product_item discount">
                                            <div class="product_border"></div>
                                            <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                <img src="{{ asset('images/'.$images[0]) }}" style="width:120px;height:120px; object-fit: cover;"  >
                                            </div>

                                            <div class="product_content">
                                                @if($product->discount !=0)
                                                    <div class="product_price">Rp.{{number_format( $product->price-($product->price*$product->discount/100)),0}}<span>Rp.{{$product->price}}</span></div>
                                                    <div class="product_name"><div><a href="{{ url('owner-products/'.$product->id ) }}" tabindex="0">{{$product->name}}</a></div></div>
                                                @else
                                                    <div class="product_content">
                                                        <div class="product_price">{{$product->price}}</div>
                                                        <div class="product_name"><div><a href="{{ url('owner-products/'.$product->id ) }}" tabindex="0">{{$product->name}}</a></div></div>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="product_category" style="margin-top: 1em">
                                                <h4 class="product-title"><a href="{{url('owner-products/'.$product->id)}}">Detail Produk</a></h4>
                                            </div>

                                            <ul class="product_marks">
                                                @if($product->discount!=0)
                                                    <li class="product_mark product_discount">{{$product->discount}}%</li>
                                                    <li class="product_mark product_new">new</li>
                                                @endif
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-transaction" role="tabpanel" aria-labelledby="nav-transaction-tab" style="margin-top: 1em">
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
                            <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab">
                                Belum ada Ulasan..
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-lg-12 d-flex justify-content-center">
                        <div class="card text-center" style="width: 30rem">
                            <img class="rounded mx-auto d-block" style="width: 14rem; margin-top: 2em" src="{{asset('images/shop.png')}}" alt="Card image cap">
                            <div class="card-body">
                                <h3 style="color: #8b0000">{{$store->store_name}}</h3>
                                <h6 class="card-title">Toko Anda Sudah Aktif</h6>
                                <p class="card-text">Jangan sampai toko Anda kosong begitu saja. Tambahkan produk pertamamu dan mulai berjualan sekarang.</p>
                                <a href="{{url('owner-products/create')}}">
                                    <button type="button" class="btn btn-primary" style="margin-top: 1em;background-color: #8b0000; width: 18rem" >Tambah Produk</button>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
