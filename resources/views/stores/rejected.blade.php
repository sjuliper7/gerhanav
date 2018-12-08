@extends('layouts.index-for-detail')

@section('header')
    <nav class="main_nav">
        <div class="container">
            <div class="row">
                <div class="col">

                    <div class="main_nav_content d-flex flex-row">

                        <!-- Categories Menu -->

                        <div class="cat_menu_container">
                            <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                <div class="cat_burger"><span></span><span></span><span></span></div>
                                <div class="cat_menu_text">Kategori</div>
                            </div>

                            <ul class="cat_menu">
                                <li><a href="#">Pakaian <i class="fas fa-chevron-right ml-auto"></i></a></li>
                                <li><a href="#">Cenderamata<i class="fas fa-chevron-right"></i></a></li>
                                <li><a href="#">Ukiran<i class="fas fa-chevron-right"></i></a></li>
                                <!--
                                <li class="hassubs">
                                    <a href="#">Ukiran<i class="fas fa-chevron-right"></i></a>
                                    <ul>
                                        <li class="hassubs">
                                            <a href="#">Menu Item<i class="fas fa-chevron-right"></i></a>
                                            <ul>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                                <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                        <li><a href="#">Menu Item<i class="fas fa-chevron-right"></i></a></li>
                                    </ul>
                                </li>
                            -->
                                <li><a href="#">Patung<i class="fas fa-chevron-right"></i></a></li>
                                <li><a href="#">Buku<i class="fas fa-chevron-right"></i></a></li>
                            </ul>
                        </div>

                        <!-- Main Nav Menu -->

                        <div class="main_nav_menu ml-auto">
                            <ul class="standard_dropdown main_nav_dropdown">
                                <li class="page_menu_item">
                                    <a href="/">Home<i class="fa fa-angle-down"></i></a>
                                </li>

                                <li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
                                <li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
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
                                <input type="search" required="required" class="page_menu_search_input" placeholder="Cari produk...">
                            </form>
                        </div>
                        <ul class="page_menu_nav">
                            <li class="page_menu_item has-children">
                                <a href="#">Language<i class="fa fa-angle-down"></i></a>
                                <ul class="page_menu_selection">
                                    <li><a href="#">English<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Italian<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">Japanese<i class="fa fa-angle-down"></i></a></li>
                                </ul>
                            </li>
                            <li class="page_menu_item has-children">
                                <a href="#">Currency<i class="fa fa-angle-down"></i></a>
                                <ul class="page_menu_selection">
                                    <li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                                    <li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
                                </ul>
                            </li>
                            <li class="page_menu_item">
                                <a href="#">Home<i class="fa fa-angle-down"></i></a>
                            </li>

                            <li class="page_menu_item"><a href="blog.html">blog<i class="fa fa-angle-down"></i></a></li>
                            <li class="page_menu_item"><a href="contact.html">contact<i class="fa fa-angle-down"></i></a></li>
                        </ul>

                        <div class="menu_contact">
                            <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('template/images/phone_white.png')}}" alt=""></div>+38 068 005 3570</div>
                            <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('template/images/mail_white.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">batakzone@gmail.com</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')

    <div class="container py-5">
        <div class="row">
            <div class="col-md-10 mx-auto" >
                <div class="card bg-danger">
                    <div class="card-header text-center">
                        <p class="text-white">Permohonan Anda Ditolak</p>
                        <p class="text-white">Comment :  {{$requestStore->comment}}</p>
                    </div>
                </div>
                <p class="text-bold text-center" style="margin-top: 20px"><a href="{{url('/request-stores/create')}}">Request Store</a></p>
            </div>
        </div>
    </div>

@endsection
