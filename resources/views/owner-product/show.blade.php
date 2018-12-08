@extends('layouts.index-for-detail')

@section('title', '| View Product')

@section('content')
    <div class="container py-3">
        @if ($message = Session::get('flash_message'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <img src="http://localhost:8000/images/tas-batak1.jpg" style="/*! max-height:425px; *//*! max-width:425px; */margin-top:30px; margin-left: 80px;/*! object-fit: cover; */width: 70%;" class="rounded  d-block">
                    {{--<img src="{{ asset('images/'.$images[0])  }}" class="rounded mx-auto d-block"  style="max-height:425px;max-width:425px;margin-top:10px; object-fit: cover;">--}}
                </div>
                <div class="row">
                    @for($i = 1; $i<count($images);$i++)
                        <img src="{{ asset('images/'.$images[$i])  }}" class="rounded mx-auto d-block" style="max-height:100px;max-width:100px;margin-top:20px; object-fit: cover;">
                    @endfor
                </div>
            </div>

            <div class="col-md-6">
                <h2>{{ $product->name}}</h2>
                <hr>
                <b><p class="lead text-danger">Harga : Rp {{ number_format($product->price,2) }} </p></b>
                <p>Stok : {{ $product->stock }} pcs</p>
                <p>Kategori  : {{ $product->category->name}} </p>
                <p>Status  : {{ $product->status->name}} </p>
                <div class="form-row" style="margin-left: 1px;">
                    <label>Penjelasan <p>{!! $product->description !!}<a data-toggle="modal" data-target="#myModal"> Read More..</a> </p></label>
                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">{{$product->name}}</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    {!! $product->description !!}
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row" style="margin-left: 1px;">
                    <label>Cerita <p>{!! $product->story!!} <a data-toggle="modal" data-target="#myModalStory"> Read More..</a> </p></label>

                    <!-- The Modal -->
                    <div class="modal fade" id="myModalStory">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">{{$product->name}}</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    {!! $product->story !!}
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <hr>
                {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->id] ]) !!}
                <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                {{--@can('Edit Post')--}}
                <a href="{{ route('owner-products.edit', $product->id) }}" class="btn btn-info" role="button">Ubah</a>
                {{--@endcan--}}
                {{--@can('Delete Post')--}}
                <form action="{{url('products/'.$product->id)}}" method="post">
                    {{csrf_field()}}
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">Hapus</button>
                </form>
                {{--onclick="return confirm('Are you sure?')"--}}
                {{--@endcan--}}
                {!! Form::close() !!}
            </div>


            </div>

        </div>
    </div>

@endsection
