@extends('layouts.index-for-cart')

@section('content')
    <!-- Single Product -->

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cart_container">
                        @foreach($carts as $cart)
                            <div class="cart_items" style="margin-bottom: -50px">
                                <ul class="cart_list">
                                    <li class="cart_item clearfix">
                                        <?php
                                        $images = json_decode($cart->product->images);
                                        ?>
                                        <div class="cart_item_image"><img src="{{ asset('images/'.$images[0]) }}" style="max-height: 150px;max-width: 100px" alt=""></div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Nama</div>
                                                <div class="cart_item_text">{{$cart->product->name}}</div>
                                            </div>
                                            <div class="cart_item_quantity cart_info_col ">
                                                <div class="cart_item_title" style="margin-bottom: 20px;">Jumlah</div>
                                                <!-- Product Quantity -->
                                                <div class="product_quantity clearfix">
                                                    <input id="{{"quantity_input".$cart->id}}" type="text" pattern="[0-9]*" value="{{$cart->quantity}}">
                                                    <div class="quantity_buttons">
                                                        <div id="{{"inc_button-".$cart->id}}" class="quantity_inc quantity_control" onclick="up(this, {{$cart->product->stock}})"><i class="fas fa-chevron-up"></i></div>
                                                        <div id="{{"dec_button-".$cart->id}}" class="quantity_dec quantity_control" onclick="down(this, {{$cart->product->stock}})"><i class="fas fa-chevron-down"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Harga</div>
                                                <div class="cart_item_text" id="{{"price-".$cart->id}}">Rp {{number_format($cart->product->price)}}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Sub Total</div>
                                                <div class="cart_item_text" id="{{"sub_total-".$cart->id}}">Rp {{number_format($cart->sub_total_price)}}</div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        @endforeach

                        <!-- Order Total -->
                        <div class="order_total" style="margin-top: 70px">
                            <div class="order_total_content text-md-right">
                                <div class="order_total_title">Total Pemesanan:</div>
                                <div class="order_total_amount" id="order_total" >Rp {{number_format($total)}}</div>
                            </div>
                        </div>

                        <div class="cart_buttons">
                            <a href="/" button type="button" class="btn btn-danger"style="background-color: #FFFFFF;color: #000000">Batal</a>
                            <a href="{{url('/checkout')}}" type="button" class="btn btn-success"style="background-color: #8b0000">Pesan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {

        });

        function up(element, stock) {
            var totals = $('#order_total')[0].textContent.split(" ");
            var total = toNumberWithoutCommna(totals[1]);
            var identifier = element.id.split("-");
            var qtyGet = $('#quantity_input'+identifier[1]).val();
            var quantity = parseInt(qtyGet);
            var setQuantity = quantity + 1;
            var prices = $('#price-'+identifier[1])[0].textContent.split(" ");
            var price = toNumberWithoutCommna(prices[1]);

            if (setQuantity <= parseInt(stock)) {
                $('#quantity_input'+identifier[1]).val(setQuantity);
                var subTotal = parseInt(price) * parseInt(setQuantity);
                $('#sub_total-'+identifier[1]).text("Rp "+addCommas(subTotal));
                var count = parseInt(price) + parseInt(total);
                $('#order_total').text("Rp "+addCommas(count));

                $.ajax({
                    data: {
                        type : 'up',
                        cart_id: identifier[1],
                        _token: '{{ csrf_token() }}',
                    },
                    url: '/update-quantity',
                    type: 'POST',
                    success: function (data) {
                        console.log(data)
                    }
                });

            }else {
                alert("Max Stock");
                $('#quantity_input'+identifier[1]).val(stock);
            }

        }
        
        function down(element, stock) {
            var totals = $('#order_total')[0].textContent.split(" ");
            var total = toNumberWithoutCommna(totals[1]);
            var identifier = element.id.split("-");

            var qtyGet = $('#quantity_input'+identifier[1]).val();
            var quantity = parseInt(qtyGet);
            var setQuantity = quantity - 1;
            var prices = $('#price-'+identifier[1])[0].textContent.split(" ");
            var price = toNumberWithoutCommna(prices[1]);

            if (setQuantity > 1 && setQuantity <= parseInt(stock)) {
                $('#quantity_input'+identifier[1]).val(setQuantity);
                var subTotal = parseInt(price) * parseInt(setQuantity);
                $('#sub_total-'+identifier[1]).text("Rp "+addCommas(subTotal))
                var count =  parseInt(total) - parseInt(price);
                $('#order_total').text("Rp "+addCommas(count));
                console.log("down");
                $.ajax({
                    data: {
                        type : 'down',
                        cart_id: identifier[1],
                        _token: '{{ csrf_token() }}',
                    },
                    url: '/update-quantity',
                    type: 'POST',
                    success: function (data) {
                        console.log(data)
                    }
                });

            }
            else if (setQuantity == 1) {
                $('#quantity_input'+identifier[1]).val(1);
                var subTotal = parseInt(price) * parseInt(1);
                $('#sub_total-'+identifier[1]).text("Rp "+addCommas(subTotal))
                var count =  parseInt(total) - parseInt(price);
                $('#order_total').text("Rp "+addCommas(count));

                $.ajax({
                    data: {
                        type : 'down',
                        cart_id: identifier[1],
                        _token: '{{ csrf_token() }}',
                    },
                    url: '/update-quantity',
                    type: 'POST',
                    success: function (data) {
                        console.log(data)
                    }
                });
            }
        }

        function addCommas(nStr) {
            nStr += '';
            x = nStr.split('.');
            x1 = x[0];
            x2 = x.length > 1 ? '.' + x[1] : '';
            var rgx = /(\d+)(\d{3})/;
            while (rgx.test(x1)) {
                x1 = x1.replace(rgx, '$1' + ',' + '$2');
            }
            return x1 + x2;
        }
        
        function toNumberWithoutCommna(number) {
            var result = "";
            for(var i=0;i<number.length;i++){
                if(number[i] != ','){
                    result += number[i];
                }
            }
            return result;
        }

    </script>

@endsection
