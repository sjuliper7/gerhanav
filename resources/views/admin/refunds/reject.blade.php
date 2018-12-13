@extends('admin.layouts.index')

@section('title', '| Refund Product')

@section('content')

    <div class="content">
        <div class="container-fluid ">
            <div class="row">
                <form action="{{url('create-reject/')}}" method="post" id="myForm" data-toggle="validator" role="form" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Nama Produk</label>
                                    <input type="text" name="name" class="form-control" placeholder="nama" value="Nama" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Alasan Penolakan Refund</label>
                                    <textarea name="alasan-penolakan" id="summernote" class="form-control" rows="4" placeholder="Mohon isi alasan penolakan" required></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <input type="submit" value="Tambah" class="btn btn-info navbar-right" style="margin-top: 10px; margin-right: 5px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
