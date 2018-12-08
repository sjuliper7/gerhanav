@extends('admin.layouts.index')

@section('title', '| Status Products')

@section('content')

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3>Status Store</h3></div>
                        <a href="{{ URL::to('status-stores/create') }}" class="btn btn-success" style="margin-top: 5px; margin-left: 10px">Create Status</a>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($statusStores as $statusStore)
                                <tr>
                                    <td>{{$statusStore->name}}</td>
                                    <td>
                                        <a class="btn btn-small btn-info" href="{{ URL::to('status-stores/' . $statusStore->id . '/edit') }}">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{url('status-stores/'.$statusStore->id)}}" method="post">
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
            $('#brand-title').text("Status Store")
            $('#store').addClass("active")
        });
    </script>
@endsection
