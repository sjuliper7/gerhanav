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

    <div class="header_main" style="max-height: 10em; margin-top: -1em">
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
                                    <form action="{{url('search')}}" class="header_search_form clearfix" method="POST">
                                        {{csrf_field()}}
                                        <input type="search" required="required" id="myInput" class="header_search_input" name="product" placeholder="Cari Produk">
                                        <input type="text" name="category" id="input_category" hidden>
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
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-12">
                                            <div class="col-6 col-lg-6 col-sm-6 col-md-6">
                                                <a type="text" href="/login" class="" style="color: #8b0000;"> Masuk</a>
                                            </div>
                                            <div hidden>asd</div>
                                            <div class="col-5 col-lg-5 col-sm-5 col-md-5">
                                                <a type="text" href="/register" class="">Daftar </a>
                                            </div>
                                        </div>
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

                                                            <a href="/request-refund">
                                                                <div class="col-md-12">
                                                                    <div class="row">
                                                                        <img src="{{asset('images/box_closed.png')}}"
                                                                             style="max-width:10%;max-height: 10%">
                                                                        <div class="col-md-6">
                                                                            <p class="font-weight-normal">Pengembalian</p>
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
                                <input type="search" required="required" class="page_menu_search_input" placeholder="Cari Produk" style=""/>
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
    </script>

@endsection

@section('content')
<div class="container" style="margin-top: 3em; margin-bottom: 10em">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header bg-warning">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
