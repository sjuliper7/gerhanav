@extends('layouts.index-for-detail')

@section('content')
    <div class="container py-3">
        <div class="container">
            <h2>Checkout</h2>
            <hr>
            <form action="{{ url('/confirm-payment') }}" method="post" >
                {{ csrf_field() }}
                <div class="form-row">
                        <div class="col-md-6" style="box-shadow: 0 2px 6px rgba(0,0,0,.12)">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Alamat</label>
                                    <textarea type="text" name="address" class="form-control" placeholder="Alamat" data-error="Please enter name" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Provinsi</label>
                                    <select name="province-select" id="province" class="form-control" onclick="getCites()"  style="width: auto" required>
                                        <option selected="selected" name="category-selected">Pilih Provinsi</option>
                                        @foreach($provinces as $province)
                                            <option value="{{$province->province_id}}">{{$province->province}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Kota/Kabupaten</label>
                                    <select name="city-select" id="cities" class="form-control" onchange="getSubDistrict()" style="width: auto">
                                        <option selected="selected" name="status-selected">Pilih Kabupaten/Kota</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Kecamatan</label>
                                    <select name="sub-district-select" id="sub-district" class="form-control" style="width: auto">
                                        <option selected="selected" name="status-selected">Pilih Kecamatan</option>
                                    </select>
                                </div>
                            </div>

                            <div style="float: right;margin-bottom: 20px">
                                <input type="button" id="add"value="Periksa Ongkis Kirim" onclick="estimateCost()" class="btn btn-info" style="margin-top: 10px;">
                            </div>

                        </div>

                        <div class="col-md-5" style="margin-left: 20px">
                            <div class="form-group">
                                <h4>Ringkasan Belanja</h4>
                                <div class="container" style="box-shadow: 0 2px 6px rgba(0,0,0,.12)">
                                    <div class="container">
                                        <div class="row py-2">
                                            <div class="col-8">
                                                Total Harga (1 Barang)
                                            </div>
                                            <div class="col-auto">
                                                Rp {{number_format($total)}}
                                            </div>
                                        </div>
                                        <div class="row py-2">
                                            <div class="col-8">
                                                Biaya Pengiriman JNE
                                            </div>
                                            <div class="col-auto" id="est-cost">
                                                -
                                            </div>
                                        </div>
                                        <div class="row py-2">
                                            <div class="col-8">
                                                Estimasi Pengiriman
                                            </div>
                                            <div class="col-auto" id="est-day">
                                                -
                                            </div>
                                        </div>
                                        <div class="row py-2">
                                            <div class="col-8 text-bold">
                                                Total Belanja
                                            </div>
                                            <div class="col-auto" id="total-price">Rp {{number_format($total)}}</div>
                                        </div>
                                        <div class="container align-self-center py-3">
                                                <input type="text" name="total" id="total-price2"  hidden>
                                                <input type="text" id="shipment_fee" name="shipment_fee" hidden>
                                                <input type="text" id="shipment_etd" name="shipment_etd" hidden>

                                                <button type="submit" class="btn btn-block" style="background-color: darkred; color: white">Bayar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </form>
        </div>
        <div class="form-row" style="margin-top: 30px">
                <div class="container row py-2">
                    <div class="header col-2">
                        <h4>Semua Barang({{count($carts)}})</h4>
                    </div>
                    <div class="header col-2">
                        <h4>Nama Produk</h4>
                    </div>
                    <div class="header col-2" style="margin-left: 30px">
                        <h4>Harga</h4>
                    </div>
                    <div class="header col-2">
                        <h4>Kuantitas</h4>
                    </div>
                    <div class="header col-2">
                        <h4>Sub Total Harga</h4>
                    </div>
                </div>
                @foreach($carts as $cart)
                    <div class="container row py-2" style="box-shadow: 0 2px 6px rgba(0,0,0,.12); margin-left: 20px">
                        <?php
                        $images = json_decode($cart->product->images);
                        ?>
                        <div class="col-2 py-3 align-self-center">
                            <img src="{{ asset('images/'.$images[0])  }}" style="max-height:70px;max-width:70px;">
                        </div>
                        <div class="col-2 py-3 align-self-center">
                            {{$cart->product->name}}
                        </div>
                        <div class="col-2 py-3 align-self-center">
                            Rp {{number_format($cart->product->price)}}
                        </div>
                        <div class="col-2 py-3 align-self-center">
                            {{$cart->quantity}}
                        </div>
                        <div class="col-2 py-3 align-self-center">
                            Rp {{number_format($cart->sub_total_price)}}
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function () {

        });

        function getCites() {
            var province_id  =   $("#province").val();
            console.log(province_id)
            $.ajax({
                type: "POST",
                url: "get-cities",
                data: {
                    province_id : province_id,
                    _token: '{{ csrf_token() }}',
                }
            }).done(function(result) {
                var $el = $("#cities");
                $el.empty();
                if(result != null){
                    $.each(result, function(key, value) {
                        $el.append($("<option></option>")
                            .attr("value", value.city_id).text(value.city_name));
                    });
                }else {
                    $el.append($("<option></option>")
                        .attr("value",0).text("Pilih Kabupaten Kota"));
                }
                getSubDistrict();
            });
        }

        function getSubDistrict() {
            var city_id  =   $("#cities").val();
            $.ajax({type: "POST", url: "get-subdistricts", data: {city_id : city_id, _token: '{{ csrf_token() }}',
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
        
        function estimateCost() {
            // var city_id  =   $("#cities").val();
            var subdistrict_id = $("#sub-district").val();
            var courier = $("#courier").val();

            $.ajax({
                type:   "POST",
                url:    "estimate-cost",
                data: {
                    origin_id       : 1,
                    subdistrict_id  : subdistrict_id,
                    courier         : courier,
                    _token: '{{ csrf_token() }}',
                }
            }).done(function(result) {
                var total = '{{$total}}';
                // var total = toNumberWithoutCommna(totals[1]);

                var rest = parseInt(total) + parseInt(result[0].value);
                $("#total-price2").val(rest);
                $("#shipment_etd").val(result[0].etd);
                $("#shipment_fee").val(result[0].value);
                $("#est-cost").text("Rp "+addCommas(result[0].value))
                $("#est-day").text(result[0].etd +" Hari");
                $("#total-price").text("Rp "+addCommas(rest));
                $("#est-cost").addClass("bg-success");
                window.location.hash = '#est-cost';
            });

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

    </script>

@endsection
