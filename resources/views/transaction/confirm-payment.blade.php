@extends('layouts.index-for-detail')

@section('content')

    <div class="container py-5">

        <h2>Pembayaran</h2>
        <div class="row">
            {{--<div class="header">--}}
            {{--</div>--}}
            <div class="container col-lg-8 py-3" style="box-shadow: 0 2px 6px rgba(0,0,0,.12); min-width: 576px">
                <div class="container">
                    <label class="p-3 container text-center">
                        Silahkan lakukan pembayaran via bank transfer ke salah satu nomor rekening berikut.
                    </label>
                    <div class="col-lg-8" style="margin-left: 13em">
                        <div class="detail-payment">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td style="border: none;width: 45%">Nomor Pemesanan</td>
                                    <td style="border: none;">#{{$transaction->order_id}}</td>
                                </tr>
                                <tr>
                                    <td style="border: none;">Total Pembayaran</td>
                                    <td style="border: none;">Rp {{number_format($transaction->total_price)}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="detail-payment">
                            <table class="table">
                                <tbody>
                                @foreach($refBanks as $rb)
                                    <tr>
                                        <td style="border: none; width: 45%">
                                            <img src="{{asset('/images/bank_icon/'.strtolower($rb->account_vendor).'.png')}}" style="max-width: 80px;max-height: 40px"></td>
                                        <td style="border: none;">{{$rb->account_number}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <form action="{{url('/upload-payment/'.$transaction->id)}}"  method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="container col-8">
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
                        <div class="container col-7">
                            <center><label for="imgUpload" class="container col-form-label">Upload Bukti Pembayaran</label></center>
                            <input style="margin-left: 15px" type="file" id="imgUpload" name="provement" value="Upload Bukti Pembayaran" /><br>
                        </div>
                    </div>
                    <div class="container col-4 py-4">
                            <button type="submit" class="btn" style="background-color: darkred; color: white">Konfirmasi Pembayaran</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
