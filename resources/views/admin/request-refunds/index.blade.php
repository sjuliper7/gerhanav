@extends('admin.layouts.index')

@section('title', '| Refund Product')

@section('content')

    <div class="content">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        {{--<div class="panel-heading"><h3>Status Name</h3></div>--}}
                        {{--<a href="{{ URL::to('status-refund/create') }}" class="btn btn-success" style="margin-top: 5px; margin-left: 10px">Create Status</a>--}}
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Nama Produk</th>
                                    <th>Alasan Pengembalian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($requestRefunds as $requestRefund)
                                <tr>
                                    <td>{{$requestRefund->product->name}}</td>
                                    <td>{{$requestRefund->alasan_pengembalian}}</td>
                                    <td>
                                        <a href="{{url('request-refund-admin-show/'.$requestRefund->id)}}" class="btn btn-info pull-left" style="margin-right: 3px;">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
