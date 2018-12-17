@extends('layouts.index-for-profile')

@section('title', '| User Profile')

@section('content')
    <div class="container">
        <div class="panel-heading" style="margin-left:-10px"><h2>BIODATA DIRI</h2></div>

        @foreach($profiles as $profile)
            <div class="row">
                <div class="col-sm-4">
                    <tr>
                        <td><img src="{{ asset('images/'. $profile->profile_image) }}" style="height: 300px;  width: 300px;  object-fit:scale-down; border: 1px solid #ddd;  border-radius: 4px;  padding: 15px;"> </td>
                    </tr>
                </div>
                <div class="col-sm-8">
                    <table class="table table-hover">
                        <thead>
                        <thead>
                        <tr>
                            <td>Name</td><td>:</td><td>{{$user->name}}</td>
                        </tr>

                        <tr>
                            <td>Email</td><td>:</td><td>{{$user->email}}</td>
                        </tr>

                        <tr>
                            <td>Nama Lengkap</td><td>:</td><td>{{$profile->full_name}}</td>
                        </tr>

                        <tr>
                            <td>Alamat</td><td>:</td><td>{{$profile->address}}</td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td><td>:</td><td>{{$profile->date_of_birth}}</td>
                        </tr>

                        <tr>

                            <td>Image Profile</td><td>:</td><td>{{$profile->profile_image}}</td>

                            <a href="/images/{{$profile->profile_image}}" data-lightbox="roadtrip" a/>
                        </tr>
                        <tr>
                            <td>
                                <a class="btn btn-small btn-info" href="{{ URL::to('user-profile/' . $profile->id . '/edit') }}">Edit Profile</a>
                            </td>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>


                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">

                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
