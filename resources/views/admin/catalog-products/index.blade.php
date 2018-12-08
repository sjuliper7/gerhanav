@extends('admin.layouts.index')

@section('title', '| Catalog Product')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row col-md-offset-0">
                <ul class="nav nav-tabs">
                    @foreach($categories as $category)
                        @if($category->id == 1)
                            <li class="active"><a data-toggle="tab" href="{{'#menu'.$category->id}}">{{$category->name}}</a></li>
                        @else
                            <li><a data-toggle="tab" href="{{'#menu'.$category->id}}">{{$category->name}}</a></li>
                        @endif
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach($categories as $category)
                        @if($category->id == 1)
                            <div id="{{'menu'.$category->id}}" class="tab-pane fade in active">
                                <div class="col-md-10 col-md-offset-0" style="margin-top: 20px">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><h5>{{$category->name}}</h5></div>
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Store Name</th>
                                                <th>Product Name</th>
                                                <th>Product Image</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $product)
                                                @if($product->id_category == $category->id)
                                                    <tr>
                                                        <td>{{$product->store->store_name}}</td>
                                                        <td>{{$product->name}}</td>
                                                        <td>{{$product->image}}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div id="{{'menu'.$category->id}}" class="tab-pane fade">
                                <div class="col-md-10 col-md-offset-0" style="margin-top: 20px">
                                    <div class="panel panel-default">
                                        <div class="panel-heading"><h5>{{$category->name}}</h5></div>
                                        <table class="table table-hover">
                                            <thead>
                                            <tr>
                                                <th>Product Image</th>
                                                <th>Store Name</th>
                                                <th>Product Name</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($products as $product)
                                                @if($product->id_category == $category->id)
                                                    <?php
                                                    $images = json_decode($product->images);
                                                    ?>
                                                    <tr>
                                                        <td><img src="{{asset('images/'.$images[0])}}" style="max-width: 100px;max-height: 100px; padding: 5px"></td>
                                                        <td>{{$product->store->store_name}}</td>
                                                        <td>{{$product->name}}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                {{--<div class="col-md-4">--}}
                {{--coba--}}
                {{--</div>--}}


            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Catalog Products")
            $('#product').addClass("active")
        });
    </script>
@endsection
