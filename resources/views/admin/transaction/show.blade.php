@extends('admin.layouts.index')

@section('title', '| Users')

@section('content')

    <div class="content">
        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title"> DETAIL TRANSACTION</h3>
            </div>
            <div class="box-body ">
                <div class="container">
                    <div class="col-lg-7">
                        <table class="table-hover table">
                            <tr>
                                <td>Order ID</td>
                                <td>#{{$detailTransactions[0]->transaction->order_id}}</td>
                            </tr>
                            <tr>
                                <td>Total Price</td>
                                <td>Rp {{number_format($detailTransactions[0]->transaction->total_price)}}</td>
                            </tr>
                            <tr>
                                <td>Biaya Pengiriman</td>
                                <td>Rp {{number_format($detailTransactions[0]->transaction->shipment_fee)}}</td>
                            </tr>
                            <tr>
                                <td>Estimasi Pengiriman</td>
                                <td>{{$detailTransactions[0]->transaction->shipment_etd}} Hari</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{$detailTransactions[0]->transaction->address}}</td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td class="text-danger bg-success">{{$detailTransactions[0]->transaction->status->name}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-row">
                            <label>Bukti Pembayaran</label>
                        </div>
                        <div class="form-row">
                            <img style="max-width: 150px; max-height: 150px;" src="{{url('/images/'.$detailTransactions[0]->transaction->prove_payment)}}">
                        </div>
                        <div class="form-row" style="margin-top: 20px">
                            <form action="{{url('status-transaction-update/'.$detailTransactions[0]->transaction->id)}}" method="POST">
                                {{csrf_field()}}
                                <select class="form-control" name="status" style="margin-bottom: 20px" onchange="f()" id="status">
                                    @foreach ($status as $st)
                                        @if($detailTransactions[0]->transaction->id_status == $st->id)
                                            <option selected value="{{$st->id}}">{{$st->name}}</option>
                                        @else
                                            <option value="{{$st->id}}">{{$st->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                <input type="text" class="form-control" name="shipment_number" id="shipment_number" placeholder="Shipment Number" style="margin-bottom: 20px;display: none">
                                <input value="Update Status" type="submit" class="btn btn-success">
                            </form>
                        </div>
                    </div>
                </div>
                <hr>
                <table class="table table-bordered table-striped col-lg-10">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Preview Product</th>
                        <th>Quantity</th>
                        <th>Sub Total Price</th>
                        <th>Comment</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($detailTransactions as $detailTransaction)
                        <tr>
                            <td>{{$detailTransaction->product->name}}</td>
                            <td>
                                <?php
                                $images = json_decode($detailTransaction->product->images);
                                ?>
                                <img src="/images/{{ $images[0]}}" style="max-height:200px;max-width: 200px">
                            </td>
                            <td>{{$detailTransaction->quantity}}</td>
                            <td>Rp{{number_format($detailTransaction->sub_total_price)}}</td>
                            <td class="text-danger">{{$detailTransaction->comment}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="box-footer">

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Transactions")
            $('#transactions').addClass("active")
        });

        function f() {
            if($('#status').val() == "5"){
                $('#shipment_number').show();
            }else{
                $('#shipment_number').hide();
            }
        }

    </script>

@endsection
