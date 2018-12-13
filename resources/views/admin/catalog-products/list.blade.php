@extends('admin.layouts.index')

@section('title', '| Users')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">

                        <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Store Name</th>
                            <th>Product Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($catalog as $mv)

                                <?php
                                $images = json_decode($mv->product->images);
                                ?>
                                <tr>
                                    <td><img src="{{asset('images/'.$images[0])}}" style="max-width: 100px;max-height: 100px; padding: 5px"></td>
                                    <td>{{$mv->product->store->store_name}}</td>
                                    <td>{{$mv->product->name}}</td>
                                    <td>
                                        <form action="{{url('catalog-products/'.$mv->id)}}" method="post">
                                            {{csrf_field()}}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <button class="btn btn-danger" onclick="return confirm('Are you sure?')" type="submit">Delete</button>
                                        </form>
                                    </td>

                                </tr>

                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Catalog Product")
            $('#product').addClass("active")
        });
    </script>

@endsection
