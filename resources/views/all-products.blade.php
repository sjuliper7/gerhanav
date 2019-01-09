
@extends('layouts.index-for-listing')

@section('content')
    <div class="home">
        <div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
        <div class="home_overlay"></div>
        <div class="home_content d-flex flex-column align-items-center justify-content-center">
            <h2 class="home_title">Semua Produk</h2>
        </div>
    </div>

    <!-- Shop -->

    <div class="shop">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                    <!-- Shop Content -->
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
                                                @if($product->discount !=0)
                                                    <div class="product_price">Rp.{{$product->price-($product->price*$product->discount/100)}}<span>Rp.{{$product->price}}</span></div>
                                                <div class="product_name"><div><a href="{{ URL::to('buy/' . $product->name ) }}" tabindex="0">{{$product->name}}</a></div></div>
                                            @else
                                                <div class="product_content">
                                                    <div class="product_price">Rp.{{$product->price}}</div>
                                                    <div class="product_name"><div><a href="{{ URL::to('buy/' . $product->name ) }}" tabindex="0">{{$product->name}}</a></div></div>
                                                </div>
                                                @endif
                                        </div>

                                        <ul class="product_marks">
                                            @if($product->discount!=0)
                                                <li class="product_mark product_discount">{{$product->discount}}%</li>
                                                <li class="product_mark product_new">new</li>
                                            @endif
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
@endsection
