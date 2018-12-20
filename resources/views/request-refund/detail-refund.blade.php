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
                        <form action="{{url('store-refund/'.$requestRefund->id)}}" method="POST">
                            {{csrf_field()}}
                            <?php
                            $images = json_decode($requestRefund->product->images);
                            ?>
                            <div class="row mt-3">
                                <div class="cart_item_image"><img src="{{ asset('images/'.$images[0]) }}" style="height: 100%;width: 100%" alt=""></div>
                                <div class="col-md-4">
                                    <div class="card-text">{{ $requestRefund->product->store->store_name }}</div>
                                    <div class="cart_title">{{ $requestRefund->product->name }}</div>
                                    <div class="cart_price">{{ $requestRefund->detailTransaction->quantity }}</div>
                                </div>
                            </div>

                                <div class="row mt-5">
                                    <div class="col-md-6" style="margin-left: -1em">
                                        <div class="cart_text">Atas Nama</div>
                                        <div class="cart_price">Isi dengan nama yang tertera di buku tabungan anda.</div>
                                        <input type="text" name="name" class="form-control mt-2" placeholder="Isi Atas Nama" data-error="Mohon isi nomor rekening anda" required>
                                    </div>
                                    <div class="col-md-6 ml-auto">
                                        <div class="cart_text">Nama Bank</div>
                                        <div class="cart_price">Isi dengan nama bank anda.</div>
                                        <input type="text" name="bank" class="form-control mt-2" placeholder="Isi Nama Bank" data-error="Mohon isi nomor rekening anda" required>
                                    </div>
                                </div>

                            <div class="row mt-5">
                                <div class="col-md-6" style="margin-left: -1em">
                                    <div class="cart_text">Nomor Rekening Tujuan</div>
                                    <div class="cart_price">Isi dengan nomor rekening kemana kami akan mengirimkan pengembalian dana.</div>
                                    <input type="text" name="no-rek" class="form-control mt-2" placeholder="Isi Nomor Rekening Anda" data-error="Mohon isi nomor rekening anda" required>
                                </div>
                                <div class="col-md-6 ml-auto">
                                    <div class="cart_text">Pilih Metode Pengiriman</div>
                                    <div class="cart_price">Serahkan barang yang ingin dikembalikan ke kantor mitra pengiriman.</div>
                                    <select style="margin-left: 0em" name="kurir-select" id="province" class="form-control mt-2">
                                        <option value="" selected="selected" name="category-selected">Pilih Kurir Pengiriman</option>
                                        <option value="JNE">JNE</option>
                                    </select>
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
                    @elseif($requestRefund->statusRefund->status == "Accepted")
                        <div class="col-lg-12 d-flex justify-content-center">
                            <div class="text-center" style="width: 30rem">
                                <p class="card-text">
                                    Terima Kasih. Pengembalian dana Anda sedang proses.
                                    Mohon untuk menunggu.
                                </p>
                            </div>
                        </div>
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
