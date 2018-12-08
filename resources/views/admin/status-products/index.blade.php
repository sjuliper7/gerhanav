@extends('admin.layouts.index')

@section('title', '| Status Products')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <a href="{{ URL::to('status-products/create') }}" class="btn btn-success" style="margin-top: 15px; margin-left: 10px">Create Status</a>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($statusProducts as $statusProduct)
                                <tr>
                                    <td>{{$statusProduct->name}}</td>
                                    <td>
                                        <a class="btn btn-small btn-info" href="{{ URL::to('status-products/' . $statusProduct->id . '/edit') }}">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{url('status-products/'.$statusProduct->id)}}" method="post">
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
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Status Products")
            $('#product').addClass("active")
        });
    </script>
@endsection
