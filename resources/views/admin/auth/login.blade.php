<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{!! asset('template/styles/bootstrap4/bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('template/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('template/styles/bootstrap4/login.css') !!}">

    <div class="col-lg-12 .col-md-12 .col-sm-12">
        <div class="text-center" style="margin-top: 2em">
            <a href="{{ url('/') }}">
                <h1 style="font-weight: bold;color: #8b0000;">BatakZone</h1>
            </a>
        </div>

    </div>
</head>

<body>
<div class="container">
    <div class="row">
        <div class="text-center" style="margin-top: 5em;">
            <div class=".col-lg-6 .col-md-6 .col-sm-12">

                <a href="{{ url('/home') }}">
                    <img src="{{asset('images/new_login.png')}}" alt="Responsive image" style="max-width: 100%;height: auto">
                </a>
                <h3> Selamat datang di BatakZone</h3></b>
                <h5 class="font-weight-normal">Masuk dan penuhi berbagai kebutuhanmu disini.</h5>

            </div>
        </div>
        <div class="" style="margin-left: 15em">

        </div>

        <div class=".col-lg-6 .col-md-6 .col-sm-12">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    {{--<strong>Whoops!</strong>Ada beberapa masalah<br><br>--}}
                    <ul>
                        @foreach ($errors->all() as $error)
                            {{ $error }}
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="" >
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-signin my-4" >
                            <div class="card-body">
                                <h5 class="card-title text-center">Sign In</h5>
                                <p class="text-center font-weight-normal">Belum punya akun BatakZone? <a href="{{ url('/register') }}"> Daftar</a></p><br>
                                <form class="form-signin form-group" action="{{ url('/login') }}" method="post">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" name="email" style="width: 21em" class="rounded-0" placeholder="Email address"
                                               required autofocus>
                                        <label for="inputEmail">Email address</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" name="password" style="width: 21em" class="rounded-0"
                                               placeholder="Password" required>
                                        <label for="inputPassword">Password</label>
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check" style="margin-left: 25px">
                                            <input type="checkbox" class="form-check-input " id="exampleCheck1" >
                                            <label class="form-check-label" for="exampleCheck1" style="padding-left: 0px">Remember me </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block text-uppercase rounded" type="submit">Sign in
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

</div>

<script src="{!! asset('template/js/jquery-3.3.1.min.js') !!}"></script>
<script src="{!! asset('template/js/bootstrap.bundle.min.js') !!}"></script>

</body>
</html>
