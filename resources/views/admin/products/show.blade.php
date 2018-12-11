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
                    <p class="lead text-danger">Discount : {{ number_format($product->discount) }}% </p>
                    <p class="lead text-danger">Harga Akhir: Rp {{ number_format($lastPrice,2) }} </p>
                    <p class="lead text-success">Stok : {{ $product->stock }} pcs</p>
                    <p class="lead text-success">Kategori  : {{ $product->category->name}} </p>
                    <p class="lead text-success">Status  : {{ $product->status->name}} </p>
                    <p class="small">Deskripsi  : {!! $product->description !!} </p>
                    <p class="small">Cerita  : {!! $product->story !!} </p>


                    <hr>
                    {!! Form::open(['method' => 'DELETE', 'route' => ['products.destroy', $product->id] ]) !!}
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                    {{--@can('Edit Post')--}}
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info" role="button">Ubah</a>
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
