@extends('admin.layouts.index')

@section('title', '| Refund Product')

@section('content')

    <div class="content">
        <div class="container-fluid ">
            <div class="form-row">
                <div class="col-md-4">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <img src="{{url('/images/'.$requestRefund->bukti_barang_image)}}" class="rounded mx-auto d-block"  style="height:225px;width:225px;margin-top:10px; object-fit: cover;">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2>{{ $requestRefund->product->name }}</h2>
                    <p class="lead text-success">{{ $requestRefund->alasan_pengembalian }}</p>
                    <p class="lead text-success">Keterangan Alasan: </p>
                    <p class="big">{{ $requestRefund->keterangan }}</p>
                    <div style="float: left;margin-bottom: 20px">
                        @if($requestRefund->statusRefund->status == "Pending")
                            <div class="col-md-6">
                                <form action="{{url('accept-request-refund/'.$requestRefund->id)}}" method="POST">
                                    {{csrf_field()}}
                                    <input value="Accept" type="submit" class="btn btn-success">
                                </form>
                            </div>
                            <div class="col-md-6">
                                <a href="{{url('reject-request-refund/'.$requestRefund->id)}}" class="btn btn-info">Decline</a>
                            </div>
                        @else
                            {{ $requestRefund->statusRefund->status }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Request Refund Products")
            $('#product').addClass("active")
        });
    </script>
@endsection
