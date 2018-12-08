@extends('layouts.index-for-detail')

@section('content')

    <div class="container py-5">
        <div class="row">
            <div class="header">
                <h2>Konfirmasi Pembayaran</h2>
            </div>

            <div class="container col-8 mt-5 py-4" style="box-shadow: 0 2px 6px rgba(0,0,0,.12)">
                <form action="" method="">
                    <div class="container form-group row">
                        <label for="idTransaction" class="container col-sm-3 col-form-label">ID Transaksi</label>
                        <div class="container col-8">
                            <input type="text" class="form-control" id="idTransaction" />
                        </div>
                    </div>
                    <div class="container form-group row">
                        <label for="originBank" class="container col-sm-3 col-form-label">Bank Asal</label>
                        <div class="container col-sm-8">
                            <input type="text" class="form-control" id="originBank" />
                        </div>
                    </div>
                    <div class="container form-group row">
                        <label for="destinationBank" class="container col-sm-3 col-form-label">Bank Tujuan</label>
                        <div class="container col-sm-8">
                            <input type="text" class="form-control" id="destinationBank" />
                        </div>
                    </div>
                    <div class="container form-group row">
                        <label for="amount" class="container col-sm-3 col-form-label">Jumlah</label>
                        <div class="container col-sm-8">
                            <input type="text" class="form-control" id="amount" />
                        </div>
                    </div>
                    <div class="container form-group row">
                        <label for="imgUpload" class="container col-sm-3 col-form-label">Upload Gambar</label>
                        <div class="container col-sm-8">
                            <input type="file" id="imgUpload" name="imgUpload" accept="image/*" value="Upload File" />
                        </div>
                    </div>

                    <div class="container py-4 text-center">
                        <button type="button" class="btn" style="background-color: gray; color: white">Batal</button>
                        <button type="submit" class="btn" style="background-color: darkred; color: white">Selesai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
