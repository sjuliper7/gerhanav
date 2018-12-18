@extends('layouts.index-for-cart')

@section('content')
    <div class="container mt-5">
        <div class="header">
            <h2>Pengembalian Dana</h2>
        </div>
        <div class="row mt-3 ml-1 mb-5">
            <div class="modal-body">
                <div class="container-fluid">
                    @if($requestRefund->statusRefund->status == "Pending")
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="text-center" style="width: 30rem">
                                <p class="card-text">
                                    Mohon menunggu konfirmasi kami untuk melanjutkan proses selanjutnya.
                                    Terima Kasih
                                </p>
                            </div>
                        </div>
                    @elseif($requestRefund->statusRefund->status == "Accepted" && is_null($requestRefund->refunds))
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="text-center" style="width: 30rem">
                                <p class="card-text">
                                    Terima Kasih. Pengembalian dana Anda sedang proses.
                                    Mohon untuk menunggu.
                                </p>
                            </div>
                        </div>
                    @elseif($requestRefund->statusRefund->status == "Accepted")
                        <form action="/" method="POST">
                            <div class="row mt-3">
                                <div class="cart_item_image"><img src="http://127.0.0.1:8000/template/images/cart.png" style="height: 100%;width: 100%" alt=""></div>
                                <div class="col-md-4">
                                    <div class="card-text">Nama Toko</div>
                                    <div class="cart_title">Nama Toko</div>
                                    <div class="cart_price">Jumlah: 1</div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-md-6" style="margin-left: -1em">
                                    <div class="cart_text">Pilih Metode Pengiriman</div>
                                    <div class="cart_price">Serahkan barang yang ingin dikembalikan ke kantor mitra pengiriman.</div>
                                    <select style="margin-left: 0em" name="province-select" id="province" class="form-control mt-2" onclick="getCites()">
                                        <option selected="selected" name="category-selected">Pilih Kurir Pengiriman</option>
                                    </select>
                                </div>
                                <div class="col-md-6 ml-auto">
                                    <div class="cart_text">Nomor Rekening Tujuan</div>
                                    <div class="cart_price">Isi dengan nomor rekening kemana kami akan mengirimkan pengembalian dana.</div>
                                    <input type="text" name="" class="form-control mt-2" placeholder="Isi Nomor Rekening Anda" data-error="Mohon isi nomor rekening anda" required>
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
                    @else
                        <div class="row">
                            <div class="col-md-push-10">
                                <div class="cart_text">Mohon maaf, pengembalian dana Anda harus kami tolak dikarenakan: </div>
                                <div class="cart_text">{{ $requestRefund->konfirmasiRefund->alasan_penolakan }}</div>
                                <div class="cart_text">Untuk info lebih lanjut, silahkan menghubungi kontak dibawah ini.</div>
                                <div class="cart_text">{{ $requestRefund->konfirmasiRefund->no_hp_yang_dihubungi }}</div>
                                <div class="cart_text">Email : admin@batakzone.co.id </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
