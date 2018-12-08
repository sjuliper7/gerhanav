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
                        <br>
                        <div class="shop_content">
                            <div class="shop_bar clearfix">
                                <div class="shop_product_count"><span>{{count($products)}}</span> products found</div>
                                <div class="shop_sorting">
                                    <span>Urutkan berdasarkan:</span>
                                    <ul>
                                        <li>
                                            <span class="sorting_text">highest rated<i class="fas fa-chevron-down"></i></span>
                                            <ul>
                                                <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>highest rated</li>
                                                <li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>name</li>
                                                <li class="shop_sorting_button"data-isotope-option='{ "sortBy": "price" }'>price</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product_grid">
                                <div class="product_grid_border"></div>
                                    @foreach($products as $product)
                                        <?php
                                        $images = json_decode($product->images);
                                        ?>
                                        <!-- Product Item -->
                                            <a href="{{ URL::to('buy/' . $product->name ) }}">
                                                <div class="product_item discount">
                                                    <div class="product_border"></div>
                                                    <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{ asset('images/'.$images[0]) }}" style="width:120px;height:120px; object-fit: cover;"  >
                                                    </div>
                                                    <div class="product_content">
                                                        <div class="product_price">Rp {{number_format($product->price)}}</div>
                                                        <div class="product_name"><div><a href="product.html" tabindex="0">{{$product->name}}</a></div></div>
                                                    </div>
                                                </div>
                                            </a>
                                @endforeach
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
