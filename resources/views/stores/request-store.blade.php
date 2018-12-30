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
                            <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('template/images/phone_white.png')}}}" alt=""></div>+38 068 005 3570</div>
                            <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{asset('template/images/mail_white.png')}}" alt=""></div><a href="mailto:fastsales@gmail.com">batakzone@gmail.com</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('content')
    <style>
        .tab{
            display: none;
        }

        /* Step marker: Place in the form. */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #4CAF50;
        }
    </style>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-10 mx-auto" >
                <center><h3 style="color: #8b0000">Request Toko</h3></center><br>
                <form action="{{url('request-stores')}}" method="post" id="myForm" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="tab">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Nama Toko</label>
                                <input type="text" class="form-control" id="storeName" placeholder="Nama Toko" name="store-name" required>
                            </div>
                            <div class="col-sm-6">
                                <label>Nama Pemilik</label>
                                <input type="text" class="form-control" id="storeOwner" placeholder="Nama Pemilik" name="store-owner" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Email</label>
                                <input type="text" class="form-control" id="storeName" placeholder="Email" name="store-email" required>
                            </div>
                            <div class="col-sm-6">
                                <label>Nomor Telepon</label>
                                <input type="text" class="form-control" id="storeOwner" placeholder="Nomor Telepon" name="store-phone" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-4">
                                <label>Provinsi</label>
                                <select name="province-select" id="province" class="form-control" onchange="getCites()" required >
                                    <option selected="selected" name="store_province">Pilih Provinsi</option>
                                    @foreach($provinces as $province)
                                        <option value="{{$province->province_id}}">{{$province->province}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label>Kota/Kabupaten</label>
                                <select name="city-select" id="cities" class="form-control" onchange="getSubDistrict()">
                                    <option selected="selected" name="store_districts">Pilih Kabupaten/Kota</option>
                                </select>
                            </div>
                            <div class="col-sm-3">
                                <label>Kecamatan</label>
                                <select name="sub-district-select" id="sub-district" class="form-control">
                                    <option selected="selected" name="store_sub_districts">Pilih Kecamatan</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label>Alamat</label>
                                <textarea class="form-control" name="store-address" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Nomor KTP</label>
                                <input type="text" class="form-control" id="idKtp" placeholder="Nomor KTP" name="store-ktp" required>
                            </div>
                            <div class="col-sm-6">
                                <label>Foto KTP</label>
                                <div class="form-group">
                                    <img src="http://placehold.it/400x400" id="show_ktp" style="max-width:200px;max-height:200px;" class="center-block" required/>
                                </div>

                                <div class="form-group">
                                    <label class="btn btn-info center-block">
                                        Browse
                                        <input type="file" id="input_ktp" name="ktp-image" style="display: none" required>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Nomor NPWP</label>
                                <input type="text" class="form-control" id="idKtp" placeholder="Nomor NPWP" name="store-npwp">
                            </div>
                            <div class="col-sm-6">
                                <label>Foto NPWP</label>
                                <div class="form-group">
                                    <img src="http://placehold.it/400x400" id="show_npwp" style="max-width:200px;max-height:200px;" class="center-block"/>
                                </div>

                                <div class="form-group">
                                    <label class="btn btn-info center-block">
                                        Browse
                                        <input type="file" id="input_npwp" name="npwp-image" style="display: none">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label>Nomor Rekening</label>
                                <input type="text" class="form-control" id="idKtp" placeholder="Nomor Rekening" name="store-account-number">
                                <br>
                                <label>Jenis Bank</label>
                                <select class="custom-select custom-select-lg mb-3" name="type-bank">
                                    <option selected>Pilih Bank</option>
                                    <option value="BRI">BRI</option>
                                    <option value="BNI">BNI</option>
                                    <option value="Mandiri">Mandiri</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>Foto Rekening</label>
                                <div class="form-group">
                                    <img src="http://placehold.it/400x400" id="show_account" style="max-width:200px;max-height:200px;" class="center-block" />
                                </div>

                                <div class="form-group">
                                    <label class="btn btn-info center-block">
                                        Browse
                                        <input type="file" id="input_account" name="account-image" style="display: none">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div style="float:right;">
                            <button type="button"  id="prevBtn" class="btn btn-success" onclick="nextPrev(-1)" style="margin-left: 20px;background-color: #8b0000">Previous</button>
                            <button type="button"  id="nextBtn" class="btn btn-success" onclick="nextPrev(1)"style="background-color: #8b0000">Next</button>
                            <button type="submit"  id="submit" class="btn btn-success" style="display: none;background-color: #8b0000">Submit</button>
                        </div>
                    </div>
                    <!-- Circles which indicates the steps of the form: -->
                    <div style="text-align:center;margin-top:40px;">
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                        <span class="step"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- alerts are for fun of it -->
    <div class="alerts-container">

        <div class="row">
            <div id="click-alert" class="alert alert-warning" role="alert">
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#input_ktp").change(function () {
                var ktp = '#show_ktp';
                readURL(this, ktp);
            });
            $("#input_npwp").change(function () {
                var npwp = '#show_npwp';
                readURL(this, npwp)
            })
            $("#input_account").change(function () {
                var account = '#show_account';
                readURL(this, account)
            })
        })

        function readURL(input, target) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(target).attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the crurrent tab

        function showTab(n) {
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").hidden = true;
                $("#submit").show();
            } else {
                $("#submit").hide();
                document.getElementById("nextBtn").hidden = false;
                document.getElementById("nextBtn").innerHTML = "Next";
            }

            fixStepIndicator(n)
        }

        function nextPrev(n) {
            var x = document.getElementsByClassName("tab");
            x[currentTab].style.display = "none";
            currentTab = currentTab + n
            if (currentTab >= x.length) {
                document.getElementById("regForm").submit();
                return false;
            }
            showTab(currentTab);
        }

        function fixStepIndicator(n) {
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            x[n].className += " active";
        }



        function getCites() {
            var province_id  =   $("#province").val();
            $.ajax({
                type: "POST",
                url: "/get-cities",
                data: {
                    province_id : province_id,
                    _token: '{{ csrf_token() }}',
                },
            }).done(function(result) {
                var $el = $("#cities");
                $el.empty();
                if(result != null){
                    $.each(result, function(key, value) {
                        $el.append($("<option></option>")
                            .attr("value", value.city_id).text(value.city_name));
                    });
                    getSubDistrict();
                }else {
                    $el.append($("<option></option>")
                        .attr("value",0).text("Pilih Kabupaten Kota"));
                }
            });
        }

        function getSubDistrict() {
            var city_id  =   $("#cities").val();
            $.ajax({type: "POST", url: "/get-subdistricts", data: {city_id : city_id, _token: '{{ csrf_token() }}',
                }
            }).done(function(result) {
                var $el = $("#sub-district");
                $el.empty();
                if(result != null){
                    $.each(result, function(key, value) {
                        $el.append($("<option></option>")
                            .attr("value", value.subdistrict_id).text(value.subdistrict_name));
                    });
                }else {
                    $el.append($("<option></option>")
                        .attr("value",0).text("Pilih Kecamatan"));
                }
            });
        }

    </script>

@endsection
