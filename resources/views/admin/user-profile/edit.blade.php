@extends('layouts.index-for-profile')

@section('title', '| Edit User Profile')

@section('content')

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.js"></script>

    <div class="content">
        <div class="container-fluid">

            <form action="{{url('user-profile/'.$profile->id)}}" method="post" id="myForm" data-toggle="validator" role="form" enctype="multipart/form-data"style="margin-left: 7em; margin-top: 50px;">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="col-md-4">
                        <td><img src="{{ asset('images/'. $profile->profile_image) }}" style="background-color: #fffdfd; height: 300px;  width: 300px;  object-fit:scale-down; border: 1px solid #ddd;  border-radius: 4px;  padding: 15px;"> </td>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Profile</h4>
                            </div>
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Lengkap</label>
                                                <input type="text" name="full_name" value="{{$profile->full_name}}" class="form-control border-input" placeholder="nama" data-error="Isi Nama Lengkap Anda" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <input type="text" name="address" value="{{$profile->address}}" class="form-control border-input" placeholder="Alamat" data-error="Isi Alamat Anda" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" name="date_of_birth" value="{{$profile->date_of_birth}}" class="form-control border-input" placeholder="Tanggal Lahir" data-error="Isi Tanggal Lahir Anda" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Gambar</label>
                                                <input type="file"  name="profile_image" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <a href="{{ URL::route('user-profile.index') }}" class="btn btn-info" style="margin-top:10px"> Batal </a>
                                        <input type="submit" id="add" value="Simpan" class="btn btn-info" style="margin-top: 10px;">
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{--<div class="col-md-6">--}}
                        {{--<div class="form-row">--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<label>Nama Lengkap</label>--}}
                                {{--<input type="text" name="full_name" value="{{$profile->full_name}}" class="form-control" placeholder="nama" data-error="Isi Nama Lengkap Anda" required>--}}
                                {{--<div class="help-block with-errors"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-row">--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<label>Alamat</label>--}}
                                {{--<input type="text" name="address" value="{{$profile->address}}" class="form-control" placeholder="Alamat" data-error="Isi Alamat Anda" required>--}}
                                {{--<div class="help-block with-errors"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-row">--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<label>Tanggal Lahir</label>--}}
                                {{--<input type="date" name="date_of_birth" value="{{$profile->date_of_birth}}" class="form-control" placeholder="Tanggal Lahir" data-error="Isi Tanggal Lahir Anda" required>--}}
                                {{--<div class="help-block with-errors"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="form-row">--}}
                            {{--<div class="form-group col-md-12">--}}
                                {{--<label>Gambar</label>--}}
                                {{--<input type="file"  name="profile_image" required>--}}
                                 {{--<div class="help-block with-errors"></div>--}}
                            {{--</div>--}}
                        {{--</div>--}}


                        {{--<div style="float: right;margin-bottom: 20px">--}}
                            {{--<a href="{{ URL::route('user-profile.index') }}" class="btn btn-info" style="margin-top:10px"> Batal </a>--}}
                            {{--<input type="submit" id="add" value="Simpan" class="btn btn-info" style="margin-top: 10px;">--}}
                        {{--</div>--}}
                        {{--</div>--}}



                    {{--</div>--}}
                {{--</div>--}}
            </form>

        </div>
    </div>

    <script type="text/javascript">
        $(function () {
            $("#input_image").change(function () {
                console.log("test")
                // readURL(this);
            });

            $('#cancel').click(function () {
                $('#myForm')[0].reset();
            });

        });
    </script>
@endsection

    {{--<div class="container">--}}
        {{--<h1 style="margin-top: 30px;">User Profile</h1>--}}

        {{--<div class="row" id="main">--}}
            {{--<div class="col-md-8 well" id="main">--}}
                {{--<div class="row">--}}
                    {{--<div class="col-md-12">--}}
                        {{--<form role="form"  id="myForm" action="{{ url('user-profile/'.$profile->id) }}" method="post" data-toggle="validator" role="form" enctype="multipart/form-data">--}}
                            {{--<input type="hidden" name="_method" value="PUT">--}}
                            {{--{{ csrf_field() }}--}}
                            {{----}}
                            {{--<hr class="colorgraph">--}}
                            {{--<div class="form-group">--}}
                                {{--<input type="text" name="full_name" class="form-control" value="{{$profile->full_name}}" data-error="Please enter name" required>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<input type="date" name="date_of_birth" class="form-control" value="{{$profile->date_of_birth}}" data-error="Please enter name" required>--}}
                            {{--</div>--}}

                            {{--<div class="form-group">--}}
                                {{--<input type="text" name="address" class="form-control" value="{{$profile->address}}" data-error="Please enter Address" required>--}}
                            {{--</div>--}}

                            {{--<input type="file" class="inputimages" name="profile_image" value="{{$profile->profile_image}}" required>--}}


                            {{--<div class="row">--}}
                                {{--<div class="col-xs-12 col-sm-6">--}}
                                    {{--<input type="submit" value="Cancel" class="btn btn-success btn-lg btn-block" id="cancel" style="margin-top: 70px;">--}}
                                    {{--<input type="button" id="cancel" value="Cancel" class="btn btn-danger " style="margin-top: 10px;">--}}
                                {{--</div>--}}
                                {{--<div class="col-xs-12 col-md-6">--}}
                                    {{--<input type="submit" value="Edit User Status" class="btn btn-success btn-lg btn-block" id="add" style="margin-top: 70px;">--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</form>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<script type="text/javascript">--}}

        {{--$(document).ready(function () {--}}
            {{--var i=1;--}}
            {{--$('#more').click(function(){--}}
                {{--i++;--}}
                {{--$('#dynamic_field').append('<tr id="row'+i+'">' +--}}
                    {{--'<td><div class="form-group"><img src="http://placehold.it/400x400" id="show_image-'+i+'" style="max-width:100px;max-height:100px;" class="center-block" /></div></td>'+--}}
                    {{--'<td><label class="btn btn-info">Browse<input type="file" id="input_image-'+i+'" name="images[]" onchange="loadImage(this)" style="display: none"></label></td>' +--}}
                    {{--'<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>' +--}}
                    {{--'</tr>');--}}
            {{--});--}}
            {{--$(document).on('click', '.btn_remove', function(){--}}
                {{--var button_id = $(this).attr("id");--}}
                {{--$('#row'+button_id+'').remove();--}}
            {{--});--}}
        {{--});--}}

        {{--function loadImage(input){--}}
            {{--var data = input.id.split("-");--}}
            {{--var variable;--}}
            {{--if(data[1] === ""){--}}
                {{--variable = "#show_image-";--}}
            {{--}else{--}}
                {{--variable = "#show_image-"+ data[1];--}}
            {{--}--}}

            {{--if (input.files && input.files[0]) {--}}
                {{--var reader = new FileReader();--}}
                {{--console.log(variable);--}}
                {{--reader.onload = function(e) {--}}
                    {{--$(variable).attr('src', e.target.result);--}}
                {{--}--}}
                {{--reader.readAsDataURL(input.files[0]);--}}
            {{--}--}}

        {{--}--}}

        {{--$(function () {--}}
            {{--$("#input_image").change(function () {--}}
                {{--console.log("test")--}}
                {{--// readURL(this);--}}
            {{--});--}}

            {{--$('#cancel').click(function () {--}}
                {{--$('#myForm')[0].reset();--}}
            {{--});--}}

        {{--});--}}



    {{--</script>--}}


{{--@endsection--}}


