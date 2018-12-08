@extends('admin.layouts.index')

@section('title', '| Edit User')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class='col-lg-4 col-lg-offset-4' style="padding: 20px; box-shadow: 0 0px 2px rgba(0,0,0,0.6);">
                {{-- @include ('errors.list') --}}

                {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }} {{-- Form model binding to automatically populate our fields with user data --}}

                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', null, array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('email', 'Email') }}
                    {{ Form::email('email', null, array('class' => 'form-control')) }}
                </div>

                <h5><b>Give Role</b></h5>

                <div class='form-group'>
                    @foreach ($roles as $role)
                        {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                        {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                    @endforeach
                </div>


                {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Edit Users")
            $('#rbac').addClass("active")
        });
    </script>

@endsection
