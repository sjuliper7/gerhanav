<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{!! asset('template/styles/bootstrap4/bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css"
          href="{!! asset('template/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('template/styles/bootstrap4/login.css') !!}">
    <div class=".col-lg-12 .col-md-12 .col-sm-12">
        <div class="text-center" style="margin-top: 2em">
            <a href="{{ url('/') }}">
                <h1 style="font-weight: bold;color: #8b0000;">BatakZone</h1>
            </a>
        </div>
    </div>
    </div>

</head>

<body>
<div class="container">
    <div class="row">

        <div class="col-lg-6 .col-md-4 .col-sm-6">
            <div class="text-center">
                <a href="{{ url('/home') }}">
                    <img class="image wrapper" src="images/register.png" alt="" style="width: 100%;height: auto">
                </a>

                <b><h3> Jual beli mudah hanya di BatakZone</h3></b>
                <b><h5 class="font-weight-normal">Gabung dan rasakan kemudahan bertransaksi di BatakZone</h5></b>
            </div>

        </div>

        <div class="" style="margin-left: 10em">

        </div>
        <div class=".col-lg-6 .col-md-4 .col-sm-12">
            @if (count($errors) == 1)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p style="font-size: 11px" class="text-center">{{ $error }}</p>
                    @endforeach
                </div>

            @elseif(count($errors) > 1)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <ul>
                            <li style="font-size: 11px">{{ $error }}</li>
                        </ul>
                    @endforeach
                </div>
            @endif
            <div class="row">
                <div class=".col-lg-12 .col-md-6">
                    <div class="card card-signin my-10">
                        <div class="card-body">
                            <b><h5 class="card-title text-center">Daftar Sekarang</h5></b>
                            <p class="text-center font-weight-normal">Sudah punya akun BatakZone? <a
                                    href="{{ url('/login') }}"> Masuk</a></p><br>

                            <form action="{{ url('/register') }}" method="post" class="form-signin form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-label-group">
                                    <input type="text" name="name" id="inputNama" style="width: 21em" class="rounded-0"
                                           placeholder="Nama"
                                           required autofocus>
                                    <label for="inputNama">Nama</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="email" name="email" id="inputEmail" style="width: 21em"
                                           class="rounded-0"
                                           placeholder="Email address"
                                           required autofocus>
                                    <label for="inputEmail">Email address</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" name="password" id="inputPassword" style="width: 21em"
                                           class="rounded-0"
                                           placeholder="Password" required>
                                    <label for="inputPassword">Password</label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" name="password_confirmation" id="inputRePassword"
                                           style="width: 21em" class="rounded-0"
                                           placeholder="Retype-Password" required>
                                    <label for="inputRePassword">Retype-Password</label>
                                </div>
                                <div class="form-label-group">
                                    <div class="col-xs-1">
                                        <label>
                                            <div class="checkbox_register icheck">

                                                <input type="checkbox" name="terms">
                                                <button type="button"
                                                        class=" text-center btn btn-outline-light text-dark"
                                                        data-toggle="modal"
                                                        data-target="#termsModal">Terms</button>


                                            </div>


                                        </label>
                                    </div><!-- /.col -->
                                </div>

                                <button class="btn btn-lg btn-primary btn-block text-uppercase rounded" type="submit">
                                    Daftar
                                    Sekarang
                                </button>

                                <hr class="my-4">

                                <button class="btn btn-lg btn-google btn-block text-uppercase rounded" type="submit"
                                        style="background: #ea4335;"><i class="fab fa-google mr-2"></i> Sign up with
                                    Google
                                </button>
                                <button class="btn btn-lg btn-facebook btn-block text-uppercase rounded" type="submit">
                                    <i
                                        class="fab fa-facebook-f mr-2"></i> Sign up with Facebook
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

<script src="{!! asset('template/js/jquery-3.3.1.min.js') !!}"></script>
<script src="{!! asset('template/js/bootstrap.bundle.min.js') !!}"></script>

</body>
</html>
