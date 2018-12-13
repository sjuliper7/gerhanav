@extends('admin.layouts.index')

@section('title', '| Refund Product')

@section('content')

    <div class="content">
        <div class="container-fluid ">
            <div class="form-row">
                <div class="col-md-4">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <img src="http://127.0.0.1:8000/template/images/cart.png" class="rounded mx-auto d-block"  style="height:225px;width:225px;margin-top:10px; object-fit: cover;">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2>Nama Produk</h2>
                    <p class="lead text-success">Alasan</p>
                    <p class="lead text-success">Keterangan Alasan: </p>
                    <p class="small">Deskripsi Alasan</p>
                    <div style="float: left;margin-bottom: 20px">
                        <div class="col-md-6">
                            <form action="{{url('create-reject/')}}" method="POST">
                                {{csrf_field()}}
                                <input value="Accept" type="submit" class="btn btn-success">
                            </form>
                        </div>
                        <div class="col-md-6">
                            <a href="{{url('reject-refund/')}}" class="btn btn-info">Decline</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Refund Products")
            $('#product').addClass("active")
        });
    </script>
@endsection
