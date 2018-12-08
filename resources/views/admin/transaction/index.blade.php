@extends('admin.layouts.index')

@section('title', '| Users')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">

                        <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Total Price</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->user->name }}</td>
                                <td>{{ $transaction->address }}</td>
                                <td>Rp {{ number_format($transaction->total_price) }}</td>
                                <td>
                                    <a href="{{url('transactions-admin/'.$transaction->id)}}" class="btn btn-info pull-left" style="margin-right: 3px;">Detail</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Transactions")
            $('#transactions').addClass("active")
        });
    </script>

@endsection
