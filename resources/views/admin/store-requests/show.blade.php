@extends('admin.layouts.index')

@section('title', '| Users')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">STORE REQUEST {{$requestStore->store_name}}</h3>
                </div>
                <div class="box-body ">
                    <table class="table table-user-information col-lg-12">
                        <tr>
                            <th>Store Name</th>
                            <td>: </td>
                            <td>{{$requestStore->store_name}}</td>
                        </tr>
                        <tr>
                            <th>Owner</th>
                            <td>: </td>
                            <td>{{$requestStore->store_owner}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>: </td>
                            <td>{{$requestStore->store_email}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>: </td>
                            <td>{{$requestStore->store_phone}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>: </td>
                            <td>{{$requestStore->store_address}}</td>
                        </tr>
                        <tr>
                            <th>User</th>
                            <td>: </td>
                            <td>{{$requestStore->user->name}}</td>
                        </tr>
                        <tr>
                            <th>No KTP</th>
                            <td>: </td>
                            <td>{{$requestStore->store_ktp}}</td>
                        </tr>
                        <tr>
                            <th>Provinsi</th>
                            <td>: </td>
                            <td>{{$requestStore->store_province}}</td>
                        </tr>


                        <tr>
                            <th>Kabupaten</th>
                            <td>: </td>
                            <td>{{$requestStore->store_districts}}</td>
                        </tr>


                        <tr>
                            <th>Kecamatan</th>
                            <td>: </td>
                            <td>{{$requestStore->store_sub_district}}</td>
                        </tr>

                        <tr>
                            <th>KTP Image</th>
                            <td>: </td>
                            <td>
                                <a href="/images/{{$requestStore->store_ktp_image}}" data-lightbox="roadtrip">
                                    <img src="/images/{{$requestStore->store_ktp_image}}" style="max-height:200px;max-width: 200px">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>No NPWP</th>
                            <td>: </td>
                            <td>{{$requestStore->store_npwp}}</td>
                        </tr>
                        <tr>
                            <th>NPWP Image</th>
                            <td>: </td>
                            <td>
                                <a href="/images/{{$requestStore->store_npwp_image}}" data-lightbox="roadtrip">
                                    <img src="/images/{{$requestStore->store_npwp_image}}" style="max-height:200px;max-width: 200px">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>Account Number</th>
                            <td>: </td>
                            <td>{{$requestStore->store_account_bank}}</td>
                        </tr>
                        <tr>
                            <th>Type Of Bank</th>
                            <td>: </td>
                            <td>{{$requestStore->store_account_type}}</td>
                        </tr>
                        <tr>
                            <th>NPWP Image</th>
                            <td>: </td>
                            <td>
                                <a href="/images/{{$requestStore->store_account_bank_image}}" data-lightbox="roadtrip">
                                    <img src="/images/{{$requestStore->store_account_bank_image}}" style="max-height:200px;max-width: 200px">
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <th>Sent Comment</th>
                            <td>: </td>
                            <td>  <form class="" action="index.html" method="post">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-newspaper-o"></i>
                                            </div>
                                            <textarea class="form-control" placeholder="Comment"  id="comment" style="height:200px;"
                                                      name="comment">{{$requestStore->comment}}</textarea>
                                        </div>
                                        <span id="errfn2" style="color: red"></span>
                                    </div>
                                </form>
                        </tr>

                        <td>
                        <th></th>
                        <td>
                            <div style="float: right;">
                                @if($requestStore->status->name === "PENDING")
                                    <div class="col-sm-6">
                                        <form action="{{url('request-stores/'.$requestStore->id)}}" method="post">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="PUT">
                                            <input type="hidden" name="value" value="1">
                                            <button type="submit" class="btn btn-info" onclick="return confirm('Apakah anda yakin untuk MENERIMA Request Toko ini?')"><i class="fa fa-check"></i>Terima</button>
                                        </form>
                                    </div>
                                    <div class="col-sm-4">
                                        <a class="btn btn-danger" onclick="cancelRequest()"> <i class="fa fa-close"></i>Tolak</a>
                                    </div>
                                @endif
                            </div>
                        </td>
                        </tr>
                    </table>
                </div>

                <div class="box-footer">

                </div>
            </div>
        </div>
    </div>

    <script>
        //var uri = 'request-stores/'+'{{$requestStore->id}}';
        function cancelRequest() {

            //console.log(url);
            var check = confirm("Apakah anda yakin untuk MENOLAK Request Toko ini?");
            var fiedl = document.getElementById('comment');

            if (fiedl.value == ' ' || fiedl.value == null || fiedl.value == '  '
                || fiedl.value == '-') {
                alert('Pesan Harus di isi');
            } else {
                if (check) {
                    $.ajax({
                        data: {
                            comment     : fiedl.value,
                            requestID   : '{{$requestStore->id}}',
                            _token      : '{{ csrf_token() }}',
                        },
                        url: '{{url('cancel-request')}}',
                        type: 'POST',
                        success: function (data) {
                           window.location.replace(data);
                        }
                    });
                }
            }
        }
    </script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Detail Store Request")
            $('#store').addClass("active")
        });
    </script>

@endsection
