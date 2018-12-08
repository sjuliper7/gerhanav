@extends('admin.layouts.index')

@section('title', '| User Type')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                        <a href="{{ URL::to('user-types/create') }}" class="btn btn-success" style="margin-top: 5px; margin-left: 10px">Create Category Product</a>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userTypes as $userType)
                                <tr>
                                    <td>{{$userType->name}}</td>
                                    <td>
                                        <a class="btn btn-small btn-info" href="{{ URL::to('user-types/' . $userType->id . '/edit') }}">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{url('user-types'.$userType->id)}}" method="post">
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
            $('#brand-title').text("User Types")
            $('#rbac').addClass("active")
        });
    </script>
@endsection
