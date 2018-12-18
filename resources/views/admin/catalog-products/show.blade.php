@extends('admin.layouts.index')

@section('title', '| View Product')

@section('content')

    <div class="content">
        <div class="container-fluid">
            @if ($message = Session::get('flash_message'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <img src="{{ asset('images/'.$images[0])  }}" class="rounded mx-auto d-block"  style="max-height:425px;max-width:425px;margin-top:10px; object-fit: cover;">
                    </div>
                    <div class="row">
                        @for($i = 1; $i<count($images);$i++)
                            <img src="{{ asset('images/'.$images[$i])  }}" class="rounded mx-auto d-block" style="max-height:70px;max-width:70px;margin-top:10px; object-fit: cover;">
                        @endfor
                    </div>
                </div>

                <div class="col-md-6">
                    <h1>{{ $product->name}}</h1>
                    <hr>
                    <p class="lead text-danger">Harga : Rp {{ number_format($product->price,2) }} </p>
                    <p class="lead text-success">Stok : {{ $product->stock }} pcs</p>
                    <p class="lead text-success">Kategori  : {{ $product->category->name}} </p>
                    <p class="lead text-success">Status  : {{ $product->status->name}} </p>
                    <p class="small">Deskripsi  : {!! $product->description !!} </p>
                    <p class="small">Cerita  : {!! $product->story !!} </p>


                    <hr>

                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                    {{--@can('Edit Post')--}}
                    {{--<a href="{{ route('catalog-products.edit', $product->id) }}" class="btn btn-info" role="button">Ubah</a>--}}

                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Discount</button>
                    <form action="{{url('/add-catalog/'.$product->id)}}" method="POST" style="margin-top:-2.6em;margin-left: 14.5em">
                        {{csrf_field()}}
                        <input value="Add to Catalog" type="submit" onclick="save()" class="btn btn-info" role="button">
                    </form>


                    <form action="{{url('/products/discount/'.$product->id)}}" method="post" id="myForm" data-toggle="validator" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="POST ">
                        {{ csrf_field() }}
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Discount Product</h4>
                                </div>
                                <div class="modal-body">
                                        <div class="form-row">
                                            <div class="form-group col-md-1">
                                                <p class="medium"></p>
                                            </div>
                                            <div class="form-group col-md-8">
                                                <p class="medium" style="margin-top: 10px;">Discount product saat ini {{$product->discount}}%, ubah menjadi</p>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group col-md-2" style="margin-left: -40px;">
                                                <input type="text" name="discount" value="{{$product->discount}}"  class="form-control border-input" data-error="Please enter name" required>
                                                <div class="help-block with-errors"></div>
                                            </div>
                                            <div class="form-group col-md-1" style="margin-top: 8px;margin-left: -55px;">
                                                <p class="medium">%</p>
                                            </div>
                                        </div>


                                        <div class="modal-footer" style="margin-top: 50px;">
                                            <input type="submit" id="add" value="Ubah Discount" class="btn btn-info" style="margin-top: 10px;">
                                        </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    </form>

                </div>

            </div>
        </div>
    </div>

    <!-- Modal -->

    <script type="text/javascript">
        $(document).ready(function () {

        });

        function save(){

        }

    </script>


@endsection
