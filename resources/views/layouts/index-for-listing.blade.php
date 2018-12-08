<!DOCTYPE html>
<html lang="en">
<head>
    <title>Shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="BatakZone shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{!! asset('template/styles/bootstrap4/bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('template/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('template/plugins/OwlCarousel2-2.2.1/owl.carousel.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('template/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('template/plugins/jquery-ui-1.12.1.custom/jquery-ui.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('template/plugins/OwlCarousel2-2.2.1/animate.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('template/styles/shop_styles.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('template/styles/shop_responsive.css') !!}">
    <script src="{!! asset('template/js/jquery-3.3.1.min.js') !!}"></script>
    <script src="{!! asset('template/styles/bootstrap4/popper.js') !!}"></script>
    <script src="{!! asset('template/styles/bootstrap4/bootstrap.min.js') !!}"></script>
    <script src="{!! asset('template/plugins/greensock/TweenMax.min.js') !!}"></script>
    <script src="{!! asset('template/plugins/greensock/TimelineMax.min.js') !!}"></script>
    <script src="{!! asset('template/plugins/scrollmagic/ScrollMagic.min.js') !!}"></script>
    <script src="{!! asset('template/plugins/greensock/animation.gsap.min.js') !!}"></script>
    <script src="{!! asset('template/plugins/greensock/ScrollToPlugin.min.js') !!}"></script>
    <script src="{!! asset('template/plugins/OwlCarousel2-2.2.1/owl.carousel.js') !!}"></script>
    <script src="{!! asset('template/plugins/easing/easing.js') !!}"></script>
    <script src="{!! asset('template/plugins/Isotope/isotope.pkgd.min.js') !!}"></script>
    <script src="{!! asset('template/plugins/jquery-ui-1.12.1.custom/jquery-ui.js') !!}"></script>
    <script src="{!! asset('template/plugins/parallax-js-master/parallax.min.js') !!}"></script>
    <script src="{!! asset('template/js/shop_custom.js') !!}"></script>

</head>

<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">

        <!-- Top Bar -->



        <!-- Header Main -->

        <div class="header_main"style="max-height: 10em;margin-top: -3em;">
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
                                        <input type="search" required="required" class="header_search_input" placeholder="Cari produk...">
                                        <div class="custom_dropdown" hidden>
                                            <div class="custom_dropdown_list">
                                                <span class="custom_dropdown_placeholder clc"></span>
                                                <ul class="custom_list clc">

                                                </ul>
                                            </div>
                                        </div>
                                        <button type="submit" class="header_search_button trans_300" style="background-color: #8b0000" value="Submit"><img src="{{asset('/template/images/search.png')}}" alt=""></button>
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
                                                            <div class="col-md-12" style="margin-bottom: -5em">
                                                                <div class="row">
                                                                    <img src="{{asset('images/kelola_akun.png')}}"
                                                                         style="max-width:10%;max-height: 10%">
                                                                    <div class="text-left col-md-6">
                                                                        <p class="font-weight-normal">Kelola Akun</p>
                                                                    </div>

                                                                </div>

                                                            </div>

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

        <!-- Main Navigation -->

        <nav class="main_nav">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="main_nav_content d-flex flex-row"style="background-color: #8b0000">

                            <!-- Kategori Menu -->

                            <div class="cat_menu_container"style="background-color: #8b0000">
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
                                    <li><a href="contact.html"class="text-white">Contact<i class="fas fa-chevron-down"></i></a></li>
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

                        <div class="page_menu_content" style="background-color: #e74c3c">

                            <div class="top_bar_user text-right">
                                @if(Auth::guest())
                                    <div class="text-right" style="margin-right: 2em">
                                        <a type="text" href="/login" class="" style="color: #FFFFFF"> Masuk</a>
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
                                                            <div class="col-md-12" style="margin-bottom: -5em">
                                                                <div class="row">
                                                                    <img src="{{asset('images/kelola_akun.png')}}"
                                                                         style="max-width:10%;max-height: 10%">
                                                                    <div class="text-left col-md-6">
                                                                        <p class="font-weight-normal">Kelola Akun</p>
                                                                    </div>

                                                                </div>

                                                            </div>

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

                            <div class="page_menu_search">
                                <form action="#">
                                    <input type="search" required="required" class="page_menu_search_input" placeholder="Cari Produk">
                                </form>
                            </div>
                            <ul class="page_menu_nav">

                                <li class="page_menu_item">
                                    <a href="/">Home<i class="fa fa-angle-down"></i></a>
                                </li>

                                <li class="page_menu_item"><a href="#">contact<i class="fa fa-angle-down"></i></a></li>
                                <li class="page_menu_item"><a href="/my-store">My Store<i class="fa fa-angle-down"></i></a></li>
                            </ul>

                            <div class="menu_contact">
                                <div class="menu_contact_item"><a href="/login"> Masuk </a></div>
                                <div class="menu_contact_item"><a href="/register">Daftar</a></div>
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
            })
        </script>

    </header>

    <!-- Home -->

@yield('content')


<!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                        <div class="newsletter_title_container">
                            <div class="newsletter_icon"><img src="{{asset('/template/images/send.png')}}" alt=""></div>
                            <div class="newsletter_title">Sign up for Newsletter</div>
                            <div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
                        </div>
                        <div class="newsletter_content clearfix">
                            <form action="#" class="newsletter_form">
                                <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
                                <button class="newsletter_button">Berlangganan</button>
                            </form>
                            {{--<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-2">
                    <div class="footer_column">
                        <div class="footer_title"><h4>BatakZone</h4></div>
                        <ul class="footer_list">
                            <div class="footer_subtitle"><a href="#"><h5 style="color: #8b0000"> Tentang Kami</h5></a></div>
                            <div class="footer_subtitle"><a href="#"><h5 style="color: #8b0000"> Hubungi Kami</h5></a></div>
                        </ul>

                    </div>

                </div>

                <div class="col-lg-2 ">
                    <div class="footer_column">
                        <div class="footer_title"><h4>Beli</h4></div>
                        <ul class="footer_list">
                            <div class="footer_subtitle"><a href="#"><h5 style="color: #8b0000"> Cara Belanja</h5></a></div>
                            <div class="footer_subtitle"><a href="#"><h5 style="color: #8b0000"> Pembayaran</h5></a></div>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer_column">
                        <div class="footer_title"><h4>Jual</h4></div>
                        <ul class="footer_list">
                            <div class="footer_subtitle"><a href="#"><h5 style="color: #8b0000"> Cara Berjualan Online</h5></a></div>
                            <div class="footer_subtitle"><a href="#"><h5 style="color: #8b0000"> Pencairan Dana</h5></a></div>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="footer_column">
                        <div class="footer_title"><h4>Bantuan</h4></div>
                        <ul class="footer_list">
                            <div class="footer_subtitle"><a href="#"><h5 style="color: #8b0000"> Syarat dan Ketentuan</h5></a></div>
                            <div class="footer_subtitle"><a href="#"><h5 style="color: #8b0000"> Kebijakan Privasi</h5></a></div>

                            <div class=""style="margin-bottom: 1em"><img src="{{asset('images/phone_icon.png')}}"style="max-width: 100%;max-height: 100%">+62 821-6548-5311</div>
                            <div class=""style="margin-bottom: 1em"><img src="{{asset('images/email_icon.png')}}"style="max-width: 100%;max-height: 100%"> cs@batakzone.com</div>

                        </ul>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="row">
                        <div class="col-sm-2">
                            <img src="{{asset('images/mobile.png')}}"style="width: 40px;height: 80px; ">
                        </div>

                        <div class="col-sm-10">
                            <a href="" > <h5 style="color: #8b0000"> Dapatkan Aplikasi Mobile BatakZone >></h5></a>

                            <h5 style="color: #8b0000"> Ikuti Kami</h5>
                            <div class="footer_social">
                                <ul>
                                    <li ><a href="#"><i class="fab fa-facebook-f" style="color: #8b0000"></i></a></li>
                                    <li><a href="#"><i class="fab fa-twitter" style="color: #8b0000"></i></a></li>
                                    <li><a href="#"><i class="fab fa-youtube" style="color: #8b0000"></i></a></li>
                                    <li><a href="#"><i class="fab fa-google" style="color: #8b0000"></i></a></li>
                                    {{--<li><a href="#"><i class="fab fa-vimeo-v" style="color: #8b0000"></i></a></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright -->

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                        <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="logos ml-sm-auto">
                            <ul class="logos_list">
                                <li><a href="#"><img src="{{asset('/template/images/logos_1.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('/template/images/logos_2.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('/template/images/logos_3.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{asset('/template/images/logos_4.png')}}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>
