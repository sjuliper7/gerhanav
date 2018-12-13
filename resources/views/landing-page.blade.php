@extends('layouts.index')

@section('header')

    <style>
        .autocomplete-items {
            position: absolute;
            border: 1px solid #d4d4d4;
            border-bottom: none;
            border-top: none;
            z-index: 99;
            /*position the autocomplete items to be the same width as the container:*/
            top: 100%;
            left: 0;
            right: 0;
        }

        .autocomplete-items div {
            padding: 10px;
            cursor: pointer;
            background-color: #fff;
            display: -moz-inline-block;
            border-bottom: 1px solid #d4d4d4;
        }

        .autocomplete-items div:hover {
            /*when hovering an item:*/
            background-color: #e9e9e9;
        }

        .autocomplete-active {
            /*when navigating through the items using the arrow keys:*/
            background-color: DodgerBlue !important;
            color: #ffffff;
        }
    </style>

    <div class="header_main"style="max-height: 10em;margin-top: -3em;">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <div class="header_main"style="max-height: 10em">
            <div class="container">
                <div class="row">

                    <!-- Logo -->
                    <div class="col-lg-2 col-sm-3 col-3 order-1">
                        <div class="logo_container">
                            <div class="logo"><a href="/" style="color: #8b0000">BatakZone</a></div>
                        </div>
                    </div>

                    <!-- Search -->
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="#" class="header_search_form clearfix">
                                        <input type="search" required="required" id="myInput" class="header_search_input" placeholder="Cari Produk">
                                        <input type="text" name="category" id="input_category" hidden>
                                        <div class="custom_dropdown">
                                            <div class="custom_dropdown_list">
                                                <span class="custom_dropdown_placeholder clc">Semua Kategori</span>
                                                <i class="fas deals_featuredfa-chevron-down"></i>
                                                <ul class="custom_list clc">
                                                    @foreach($categoryProducts as $categoryProduct)
                                                        <li><a class="clc" href="{{url('/products-by/'.$categoryProduct->name)}}">{{$categoryProduct->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <button type="submit" class="header_search_button trans_300"style="background-color: #8b0000" value="Submit"><img src="{{asset('template/images/search.png')}}" alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Wishlist -->
                    <div class="col-lg-4 col-9 order-lg-3 order-2 ">

                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                            <!-- Cart -->
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon">
                                        <img src="{{asset('template/images/cart.png')}}" alt="">
                                        <div class="cart_count"style="background-color: #8b0000"><span id="cart_value">0</span></div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="/carts">Keranjang</a></div>
                                        {{--<div class="cart_price">$85</div>--}}
                                    </div>
                                </div>
                            </div>

                            <div class="top_bar_user">
                                @if(Auth::guest())
                                    <div style="margin-right: 2em">
                                        <a type="text" href="/login" class="" style="color: #8b0000"> Masuk</a>
                                    </div>
                                    <div>
                                        <a type="text" href="/register" class="">Daftar </a>
                                    </div>

                                @else
                                    <div class="top_bar_user" style="width:20em;margin-right: -10em; margin-left: -1em">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <span class="glyphicon glyphicon-user"></span>
                                            <?php
                                            $name = explode(" ",Auth::user()->name);
                                            ?> 
                                            Hello <strong class="fa fa-user-circle"> {{$name[0]}}</strong>
                                            <span class="glyphicon glyphicon-chevron-down"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="container">
                                                    <div class="row">

                                                        <div class="col-md-12">
                                                            <a href="/user-profile">
                                                                <div class="col-md-12" style="margin-bottom: -5em">
                                                                    <div class="row">
                                                                        <img src="{{asset('images/kelola_akun.png')}}"
                                                                             style="max-width:10%;max-height: 10%">
                                                                        <div class="text-left col-md-6">
                                                                            <p class="font-weight-normal">Kelola Akun</p>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </a>

                                                            <a href="/transactions">
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <img src="{{asset('images/box_closed.png')}}"
                                                                             style="max-width:10%;max-height: 10%">
                                                                        <div class="col-md-6">
                                                                            <p class="font-weight-normal">Pesanan
                                                                                Saya</p>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </a>


                                                            <div class="col-md-12" style="margin-top:0em">
                                                                <div class="row">
                                                                    <img src="{{asset('images/off.png')}}"
                                                                         style="max-width:10%;max-height: 10%">
                                                                    <div class="col-md-6">
                                                                        <form id="logout-form"
                                                                              action="{{ url('/logout') }}"
                                                                              method="POST" style="border: 0em">
                                                                            {{ csrf_field() }}
                                                                            <input type="submit" value="Logout" style="background: transparent;border: none; font-size: 14px;line-height: 1.7;font-weight: 400;color: #535353;">
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                @endif


                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->

    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="main_nav_content d-flex flex-row"style="background-color: #8b0000">

                        <!-- Categories Menu -->

                        <div class="cat_menu_container"style="background-color: #8b0000; z-index: unset">
                            <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                <div class="cat_burger"><span></span><span></span><span></span></div>
                                <div class="cat_menu_text">KATEGORI</div>
                            </div>

                            <ul class="cat_menu">
                                @foreach($categoryProducts as $categoryProduct)
                                    <li><a href="{{url('/products-by/'.$categoryProduct->name)}}">{{$categoryProduct->name}}<i class="fas fa-chevron-right ml-auto"></i></a></li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Main Nav Menu -->

                        <div class="main_nav_menu ml-auto"style="background-color: #8b0000;margin-right: 2em">
                            <ul class="standard_dropdown main_nav_dropdown">
                                <li><a href="/" class="text-white">Home<i class="fas fa-chevron-down "></i></a></li>
                                <li><a href="#"class="text-white">Contact<i class="fas fa-chevron-down"></i></a></li>
                                <li><a href="/my-store"class="text-white">My Store<i class="fas fa-chevron-down"></i></a></li>
                            </ul>
                        </div>

                        <!-- Menu Trigger -->

                        <div class="menu_trigger_container ml-auto">
                            <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                <div class="menu_burger">
                                    <div class="menu_trigger_text">menu</div>
                                    <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Menu -->

    <div class="page_menu">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="page_menu_content">

                        <div class="page_menu_search">
                            <form action="#">
                                <input type="search" required="required" class="page_menu_search_input" placeholder="Cari Produk" style="textcol">
                            </form>
                        </div>
                        <ul class="page_menu_nav">

                            <li class="page_menu_item">
                                <a href="/home">Home<i class="fa fa-angle-down"></i></a>
                            </li>

                            <li class="page_menu_item"><a href="#">contact<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item"><a href="/my-store">My Store<i class="fa fa-angle-down"></i></a></li>
                        </ul>

                        <div class="menu_contact">
                            <div class="menu_contact_item"><a href="/login"> Login </a></div>
                            <div class="menu_contact_item"><a href="/register">Register</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            if("{{Auth::guest()}}"){
                $("#cart_value").text("0");
            }else{
                $.ajax({
                    url: '/get-user',
                    type: 'GET',
                    success: function (id) {
                        console.log(id)
                        $.ajax({
                            url: '/get-carts/'+id,
                            type: 'GET',
                            success: function (data) {
                                console.log(data)
                                $("#cart_value").text(data);
                            }
                        });
                    }
                });
            }
        });

        function autocomplete(inp, arr) {
            /*the autocomplete function takes two arguments,
            the text field element and an array of possible autocompleted values:*/
            var currentFocus;
            /*execute a function when someone writes in the text field:*/
            inp.addEventListener("input", function(e) {
                var a, b, i, val = this.value;
                /*close any already open lists of autocompleted values*/
                closeAllLists();
                if (!val) { return false;}
                currentFocus = -1;
                /*create a DIV element that will contain the items (values):*/
                a = document.createElement("DIV");
                a.setAttribute("id", this.id + "autocomplete-list");
                a.setAttribute("class", "autocomplete-items");
                /*append the DIV element as a child of the autocomplete container:*/
                this.parentNode.appendChild(a);
                /*for each item in the array...*/
                for (i = 0; i < arr.length; i++) {
                    /*check if the item starts with the same letters as the text field value:*/
                    if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                        /*create a DIV element for each matching element:*/
                        b = document.createElement("DIV");
                        /*make the matching letters bold:*/
                        b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                        b.innerHTML += arr[i].substr(val.length);
                        /*insert a input field that will hold the current array item's value:*/
                        b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                        /*execute a function when someone clicks on the item value (DIV element):*/
                        b.addEventListener("click", function(e) {
                            /*insert the value for the autocomplete text field:*/
                            inp.value = this.getElementsByTagName("input")[0].value;
                            /*close the list of autocompleted values,
                            (or any other open lists of autocompleted values:*/
                            closeAllLists();
                        });
                        a.appendChild(b);
                    }
                }
            });
            /*execute a function presses a key on the keyboard:*/
            inp.addEventListener("keydown", function(e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed,
                    increase the currentFocus variable:*/
                    currentFocus++;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 38) { //up
                    /*If the arrow UP key is pressed,
                    decrease the currentFocus variable:*/
                    currentFocus--;
                    /*and and make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                        /*and simulate a click on the "active" item:*/
                        if (x) x[currentFocus].click();
                    }
                }
            });
            function addActive(x) {
                /*a function to classify an item as "active":*/
                if (!x) return false;
                /*start by removing the "active" class on all items:*/
                removeActive(x);
                if (currentFocus >= x.length) currentFocus = 0;
                if (currentFocus < 0) currentFocus = (x.length - 1);
                /*add class "autocomplete-active":*/
                x[currentFocus].classList.add("autocomplete-active");
            }
            function removeActive(x) {
                /*a function to remove the "active" class from all autocomplete items:*/
                for (var i = 0; i < x.length; i++) {
                    x[i].classList.remove("autocomplete-active");
                }
            }
            function closeAllLists(elmnt) {
                /*close all autocomplete lists in the document,
                except the one passed as an argument:*/
                var x = document.getElementsByClassName("autocomplete-items");
                for (var i = 0; i < x.length; i++) {
                    if (elmnt != x[i] && elmnt != inp) {
                        x[i].parentNode.removeChild(x[i]);
                    }
                }
            }
            /*execute a function when someone clicks in the document:*/
            document.addEventListener("click", function (e) {
                closeAllLists(e.target);
            });
        }

        /*An array containing all the country names in the world:*/
        // var countries = ["Afghanistan","Albania","Algeria","Andorra","Angola","Anguilla","Antigua & Barbuda","Argentina","Armenia","Aruba","Australia","Austria","Azerbaijan","Bahamas","Bahrain","Bangladesh","Barbados","Belarus","Belgium","Belize","Benin","Bermuda","Bhutan","Bolivia","Bosnia & Herzegovina","Botswana","Brazil","British Virgin Islands","Brunei","Bulgaria","Burkina Faso","Burundi","Cambodia","Cameroon","Canada","Cape Verde","Cayman Islands","Central Arfrican Republic","Chad","Chile","China","Colombia","Congo","Cook Islands","Costa Rica","Cote D Ivoire","Croatia","Cuba","Curacao","Cyprus","Czech Republic","Denmark","Djibouti","Dominica","Dominican Republic","Ecuador","Egypt","El Salvador","Equatorial Guinea","Eritrea","Estonia","Ethiopia","Falkland Islands","Faroe Islands","Fiji","Finland","France","French Polynesia","French West Indies","Gabon","Gambia","Georgia","Germany","Ghana","Gibraltar","Greece","Greenland","Grenada","Guam","Guatemala","Guernsey","Guinea","Guinea Bissau","Guyana","Haiti","Honduras","Hong Kong","Hungary","Iceland","India","Indonesia","Iran","Iraq","Ireland","Isle of Man","Israel","Italy","Jamaica","Japan","Jersey","Jordan","Kazakhstan","Kenya","Kiribati","Kosovo","Kuwait","Kyrgyzstan","Laos","Latvia","Lebanon","Lesotho","Liberia","Libya","Liechtenstein","Lithuania","Luxembourg","Macau","Macedonia","Madagascar","Malawi","Malaysia","Maldives","Mali","Malta","Marshall Islands","Mauritania","Mauritius","Mexico","Micronesia","Moldova","Monaco","Mongolia","Montenegro","Montserrat","Morocco","Mozambique","Myanmar","Namibia","Nauro","Nepal","Netherlands","Netherlands Antilles","New Caledonia","New Zealand","Nicaragua","Niger","Nigeria","North Korea","Norway","Oman","Pakistan","Palau","Palestine","Panama","Papua New Guinea","Paraguay","Peru","Philippines","Poland","Portugal","Puerto Rico","Qatar","Reunion","Romania","Russia","Rwanda","Saint Pierre & Miquelon","Samoa","San Marino","Sao Tome and Principe","Saudi Arabia","Senegal","Serbia","Seychelles","Sierra Leone","Singapore","Slovakia","Slovenia","Solomon Islands","Somalia","South Africa","South Korea","South Sudan","Spain","Sri Lanka","St Kitts & Nevis","St Lucia","St Vincent","Sudan","Suriname","Swaziland","Sweden","Switzerland","Syria","Taiwan","Tajikistan","Tanzania","Thailand","Timor L'Este","Togo","Tonga","Trinidad & Tobago","Tunisia","Turkey","Turkmenistan","Turks & Caicos","Tuvalu","Uganda","Ukraine","United Arab Emirates","United Kingdom","United States of America","Uruguay","Uzbekistan","Vanuatu","Vatican City","Venezuela","Vietnam","Virgin Islands (US)","Yemen","Zambia","Zimbabwe"];

        /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
        autocomplete(document.getElementById("myInput"), countries);

    </script>

@endsection

@section('content')
    <div class="banner">
        <div class="banner_background" style="background-image:url('/template/images/banner_background.jpg')"></div>
        <div class="container fill_height">
            <div class="row fill_height">
                {{--<div class="banner_product_image"><img src="images/banner_product.png" alt=""></div>--}}
                <div class="col-lg-5 offset-lg-4 fill_height">
                    <div class="banner_content">
                        <h2 class="banner_text"style="color: #8b0000">new era of </h2>
                        <h4 class="banner_text" style="margin-bottom: 150px;color: #8b0000">Kerajinan Tangan Tanah Batak</h4>
                        {{--<div class="banner_price"><span>$530</span>$460</div>--}}
                        {{--<div class="banner_product_name">Apple Iphone 6s</div>--}}
                        {{--<div class="button banner_button"><a href="#">Shop Now</a></div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="characteristics shadow p-3 mb-5 bg-white rounded ">
        <div class="container char_item" style="padding: 20px">
            <div class="row">

                <!-- Char. Item -->
                <div class="col-lg-4 col-md-6 char_col">
                    {{--<a href="#">--}}
                    <div class="d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon">
                            <img src="images/char_3.png">
                        </div>
                        <div class="char_content">
                            <div class="char_title">Transaksi</div>
                            <div class="char_subtitle">Transaksi Aman dan Mudah</div>
                        </div>
                    </div>
                    {{--</a>--}}
                </div>



                <!-- Char. Item -->
                <div class="col-lg-4 col-md-6 char_col">
                    {{--<a href="#">--}}
                    <div class=" d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="images/contact_1.png" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Support</div>
                            <div class="char_subtitle">Layanan 24 Jam</div>
                        </div>
                    </div>
                    {{--</a>--}}
                </div>

                <!-- Char. Item -->
                <div class="col-lg-4 col-md-6 char_col">
                    {{--<a href="#">--}}
                    <div class=" d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="images/char_4.png" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Kualitas</div>
                            <div class="char_subtitle">Jaminan Kualitas Produk Lokal</div>
                        </div>
                    </div>
                    {{--</a>--}}
                </div>

                <!-- Char. Item -->

            </div>
        </div>
    </div>

    <!-- Hot Itdem -->
    <!-- Deals of the week -->

    <div class="deals_featured" style="margin-bottom: 30px; margin-top: -70px">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">
                    <!-- Featured -->
                    <div class="featured">
                        <div class="tabbed_container">
                            <div class="tabs">
                                <ul class="clearfix">
                                    <li class="active">Product</li>
                                </ul>
                                <div class="tabs_line"><span style="background-color: #8b0000"></span></div>
                            </div>

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="featured_slider slider">

                                @foreach($catalog as $mv)
                                    @if($mv->is_active == 1)
                                    <!-- Slider Item -->
                                        <div class="featured_slider_item" style="margin-bottom: 20px">
                                            <div class="border_active"></div>


                                            {{--<div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">--}}


                                            {{--<div class="product_image d-flex flex-column align-items-center justify-content-center">--}}
                                            {{--<a href="{{ URL::to('buy/' . $product->name ) }}">--}}
                                            {{--<img src="{{ asset('images/'.$images[0])  }}" style="width:150px;height:150px; object-fit: cover;" >--}}
                                            {{--</a>--}}
                                            {{--</div>--}}

                                            {{--<div class="product_content">--}}
                                            {{--<div class="bestsellers_item discount">--}}
                                            {{--<div class="bestsellers_price discount">Rp.{{$product->price}}<span>Rp.{{$product->price}}</span></div>--}}
                                            {{--</div>--}}

                                            {{--<div class="product_name"><div><a href="{{ URL::to('buy/' . $product->name ) }}">{{$product->name}}</a></div></div>--}}
                                            {{--</div>--}}
                                            {{--<ul class="product_marks">--}}
                                            {{--<li class="product_mark product_discount">{{$product->discount}}%</li>--}}
                                            {{--<li class="product_mark product_new">new</li>--}}
                                            {{--</ul>--}}
                                            {{--</div>--}}


                                            <div class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">

                                                <?php
                                                $images = json_decode($mv->product->images);
                                                ?>

                                                <div class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <a href="{{ URL::to('buy/' . $mv->product->name ) }}">
                                                        <img src="{{ asset('images/'.$images[0])  }}" style="width:150px;height:150px; object-fit: cover;" >
                                                    </a>
                                                </div>

                                                <div class="product_content">

                                                    <div class="bestsellers_item discount">
                                                        @if($mv->product->discount !=0)
                                                            <div class="bestsellers_price discount">Rp.{{$mv->product->price-($mv->product->price*$mv->product->discount/100)}}<span>Rp.{{$mv->product->price}}</span></div>
                                                        @else
                                                            <div class="product_price">Rp. {{number_format($mv->product->price,0)}}</div>
                                                        @endif
                                                    </div>
                                                    <div class="product_name"><div><a href="{{ URL::to('buy/' . $mv->product->name ) }}">{{$mv->product->name}}</a></div></div>


                                                </div>

                                                <ul class="product_marks">
                                                    @if($mv->product->discount!=0)
                                                        <li class="product_mark product_discount">{{$mv->product->discount}}%</li>
                                                        <li class="product_mark product_new">new</li>
                                                    @endif
                                                </ul>

                                            </div>
                                        </div>
                                        @endif
                                    @endforeach

                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                        </div>
                    </div>
                    <div class="deals">
                        <div class="deals_title">Promo</div>
                        <div class="deals_slider_container">

                            <!-- Deals Slider -->
                            <div class="owl-carousel owl-theme deals_slider">

                                <!-- Deals Item -->
                                @foreach($mostProductView as $mv)
                                    <?php
                                    $images = json_decode($mv->images);
                                    ?>
                                    <div class="owl-item deals_item">
                                        <div class="deals_image"><img src="{{asset('images/'.$images[0])}}" alt=""></div>
                                        <div class="deals_content">
                                            <div class="deals_info_line d-flex flex-row justify-content-start">
                                                <div class="deals_item_name">{{$mv->name}}</div>
                                                <div class="deals_item_price ml-auto">Rp {{number_format($mv->price)}}</div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                        <div class="deals_slider_nav_container">
                            <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i></div>
                            <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="viewed">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="viewed_title_container">
                        <h3 class="viewed_title">Paling Banyak Dilihat</h3>
                        <div class="viewed_nav_container">
                            <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                            <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                        </div>
                    </div>

                    <div class="viewed_slider_container">

                        <!-- Recently Viewed Slider -->

                        <div class="owl-carousel owl-theme viewed_slider">
                            <!-- Recently Viewed Item -->
                            @foreach($mostProductView as $mv)
                                <?php
                                $images = json_decode($mv->images);
                                ?>
                                <div class="owl-item">
                                    <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                        <div class="viewed_image"><img src="{{asset('images/'.$images[0])}}" alt=""></div>
                                        <div class="viewed_content text-center">
                                            <div class="viewed_price">Rp {{number_format($mv->price)}}</div>
                                            <div class="viewed_name"><a href="#">{{$mv->name}}</a></div>
                                        </div>
                                        <ul class="item_marks">
                                            {{--<li class="item_mark item_discount">-25%</li>--}}
                                            {{--<li class="item_mark item_new">new</li>--}}
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
