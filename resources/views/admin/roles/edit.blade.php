@extends('admin.layouts.index')

@section('title', '| Edit Role')


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class='col-lg-4 col-lg-offset-4' style="padding: 20px; box-shadow: 0 0px 0.1px rgba(0,0,0,0.6);">
                <h1>Edit Role: {{$role->name}}</h1>
                <hr>
                {{-- @include ('errors.list')
             --}}
                {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Role Name') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                <h5><b>Assign Permissions</b></h5>
                @foreach ($permissions as $permission)

                    {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                    {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

                @endforeach
                <br>
                {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Edit Roles")
            $('#rbac').addClass("active")
        });
    </script>

@endsection
