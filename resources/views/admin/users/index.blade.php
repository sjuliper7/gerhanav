@extends('admin.layouts.index')

@section('title', '| Users')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="row" style="margin-bottom: 1em">
                    <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
                    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">

                        <thead>
                        <tr>
                            <th>Name</th>
                            <th width="20%">Email</th>
                            <th width="25%">Date/Time Added</th>
                            <th width="15%">User Roles</th>
                            <th>Operations</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($users as $user)
                            <tr>

                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at->format('F d, Y h:ia') }}</td>
                                <td>{{  $user->roles()->pluck('name')->implode(' ') }}</td>{{-- Retrieve array of roles associated to a user and convert to string --}}

                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

                <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Users Administration")
            $('#rbac').addClass("active")
        });
    </script>

@endsection
