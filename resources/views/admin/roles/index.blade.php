@extends('admin.layouts.index')

@section('title', '| Roles')


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <h1>
                    <a href="{{ route('users.index') }}" class="btn btn-default pull-right" style="margin-bottom: 1em">Users</a>
                    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right" style="margin-bottom: 1em">Permissions</a>
                </h1>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Role</th>
                            <th>Permissions</th>
                            <th>Operation</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($roles as $role)
                            <tr>

                                <td>{{ $role->name }}</td>
                                <td>{{  $role->permissions()->pluck('name')->implode(', ') }}</td>{{-- Retrieve array of permissions associated to a role and convert to string --}}
                                <td>
                                    <a href="{{ URL::to('roles/'.$role->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                                    {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id] ]) !!}
                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                    {!! Form::close() !!}

                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>

                <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Add Role</a>

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Roles")
            $('#rbac').addClass("active")
        });
    </script>

@endsection
