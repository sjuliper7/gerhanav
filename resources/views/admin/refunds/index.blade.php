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
                                    <th>Atas Nama</th>
                                    <th>Nama Bank</th>
                                    <th>Nomor Rekening</th>
                                    <th>Kurir Pengiriman</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($refunds as $refund)
                                <tr>
                                    <td>{{$refund->product->name}}</td>
                                    <td>{{$refund->atas_nama}}</td>
                                    <td>{{$refund->jenis_bank}}</td>
                                    <td>{{$refund->no_rekening_tujuan}}</td>
                                    <td>{{$refund->kurir_pengiriman}}</td>
                                    @if($refund->requestRefund->statusRefund->status != "Completed")
                                        <td>
                                            <form action="{{url('complete-refund/'.$refund->requestRefund->id)}}" method="POST">
                                                {{csrf_field()}}
                                                <input value="Complete" type="submit" class="btn btn-success">
                                            </form>
                                        </td>
                                    @else
                                        <td>
                                            Done
                                        </td>
                                    @endif
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
            $('#brand-title').text("Refund Products")
            $('#product').addClass("active")
        });
    </script>
@endsection
