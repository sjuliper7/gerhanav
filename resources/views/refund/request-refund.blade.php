@extends('layouts.index-for-cart')

@section('content')
    <div class="container mt-5">
        <div class="header">
            <h2>Pengembalian Dana</h2>
        </div>
        <div class="row mt-3 ml-1">
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="/refund" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="id_product" class="form-control" placeholder="Status" data-error="Please enter name" required>
                        <input type="hidden" name="id_transaction" class="form-control" placeholder="Status" data-error="Please enter name" required>
                        <div class="row mt-3">
                            <div class="cart_item_image"><img src="http://127.0.0.1:8000/template/images/cart.png" style="height: 100%;width: 100%" alt=""></div>
                            <div class="col-md-4">
                                <div class="card-text">Nama Toko</div>
                                <div class="cart_title">Nama Toko</div>
                                <div class="cart_price">Jumlah: 1</div>
                            </div>
                            <div class="col-md-4 ml-auto">
                                <select name="alasan-select" id="alasan" class="form-control">
                                    <option selected="selected" name="category-selected">Pilih Alasan Pengembalian</option>
                                    <option value="Rusak">Rusak</option>
                                    <option value="Cacat">Cacat</option>
                                    <option value="Tidak Muat(untuk produk fashion)">Tidak Muat(untuk produk fashion)</option>
                                    <option value="Tidak sesuai dengan website">Tidak sesuai dengan website</option>
                                    <option value="Item yang dikirim salah">Item yang dikirim salah</option>
                                    <option value="Produk/bagian hilang">Produk/bagian hilang</option>
                                    <option value="Produk kadaluarsa">Produk kadaluarsa</option>
                                    <option value="Produk telah digunakan sebelumnya">Produk telah digunakan sebelumnya</option>
                                    <option value="Produk diduga palsu">Produk diduga palsu</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-5">
                            <div class="cart_text">Keterangan Alasan (Wajib)</div>
                        </div>
                        <div class="row mt-3">
                            <textarea type="text" name="keterangan" class="form-control" placeholder="Ketik Pesan" data-error="Pesan Harus Ada" required></textarea>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <label style="margin-left: -2.5em" class="form-check-label" for="exampleCheck1">Unggah Bukti Barang</label>
                                <input style="margin-left: -1em" type="file" class="form-control-file mt-2" id="exampleFormControlFile1">
                            </div>
                        </div>

                        <div class="row mt-5">
                            <input type="checkbox" class="" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Saya telah membaca dan menerima kebijakan pengembalian barang oleh BatakZone</label>
                        </div>

                        <div class="row mt-5">
                            <button type="submit" class="btn ml-auto col-2" style="background-color: darkred; color: white">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
