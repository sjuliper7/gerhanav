@extends('admin.layouts.index')


@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-warning text-center">
                                        <i class="ti-user"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Users</p>
                                        {{count($users)}}
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <a href="/users"><i class="ti-arrow-right"></i> More info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-success text-center">
                                        <i class="ti-pin2"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p style="font-size: 15px">Request Store</p>
                                        {{count($requestStores)}}
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <a href="/request-stores"><i class="ti-arrow-right"></i> More info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card">
                        <div class="content">
                            <div class="row">
                                <div class="col-xs-5">
                                    <div class="icon-big icon-danger text-center">
                                        <i class="ti-money"></i>
                                    </div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="numbers">
                                        <p>Transactions</p>
                                        {{count($transactions)}}
                                    </div>
                                </div>
                            </div>
                            <div class="footer">
                                <hr />
                                <div class="stats">
                                    <a href="/transactions-admin"><i class="ti-arrow-right"></i> More info</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){
            $.notify({
                icon: 'ti-gift',
                message: "Welcome to <b>BatakZone Dashboard</b> ."

            },{
                type: 'success',
                timer: 4000
            });
            $('#dashboard').addClass("active")
            $('#brand-title').text("Dashboard")
        });
    </script>
@endsection