@extends('layouts.index-for-detail')

@section('title', '| User Profile')

@section('content')
    <style>
        .image {
            height: 150px;
            position: relative;
            overflow: hidden;
        }
        .content {
            min-height: 200px;
            padding: 15px 15px 10px 15px;
            box-sizing: border-box;
        }



        .author{
            text-align: center;
            text-transform: none;
            margin-top: -65px;
            font-size: 12px;
            font-weight: 600;
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 60%;
            position: relative;
            margin-bottom: 15px;
        }

        .avatar.border-white {
            border: 5px solid #FFFFFF;
        }
        .title{
            color: #403D39;
        }

        .borderless td, .borderless th {
            border: none;
        }

    </style>
    <div class="container content">
        <div class="panel-heading" style="margin-top: 1em;"></div>
        <div class="row" style="box-sizing: border-box; padding: 15px 15px 10px 15px;">
            <div class="col-lg-1"></div>
            <div class="col-lg-3 col-md-5">
                <div class="card card-user">
                    <div class="image">
                        @if($profile->profile_image === "---")
                            <img src="{{asset('img/background.jpg')}}" alt="..."/>
                        @else
                            <img src="{{asset('images/'.$profile->profile_image)}}" alt="..."/>
                        @endif
                    </div>
                    <div class="content">
                        <div class="author">
                            <img class="avatar border-white" src="{{asset('img/face-1.jpg')}}" alt="..."/>
                            <h4 class="title">{{$profile->user->name}}<br />
                                <a href="#"><small>{{$profile->user->email}}</small></a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7">
                <div class="card">
                    {{--<div class="header">--}}
                    {{--</div>--}}
                    <div style="margin-bottom: 3.4em">
                        <table class="table borderless">
                            <tr>
                                <td>Name</td>
                                <td>{{$user->name}}</td>
                            </tr>

                            <tr>
                                <td>Email</td>
                                <td>{{$user->email}}</td>
                            </tr>

                            <tr>
                                <td>Nama Lengkap</td>
                                <td>
                                    @if($profile->full_name === "---")
                                        -
                                    @else
                                        {{$profile->full_name}}
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td>Alamat</td>
                                <td>
                                    @if($profile->address === "---")
                                        -
                                    @else
                                        {{$profile->address}}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>
                                    @if($profile->date_of_birth === "---")
                                        -
                                    @else
                                        {{$profile->date_of_birth}}
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <a class="btn btn-small btn-info" href="{{ URL::to('user-profile/' . $profile->id . '/edit') }}" >Edit Profile</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
