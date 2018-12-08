@extends('admin.layouts.index')

@section('title', '| Create Permission')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class='col-lg-4 col-lg-offset-4' style="padding: 20px; box-shadow: 0 0px 0.1px rgba(0,0,0,0.6);">

                {{-- @include ('errors.list') --}}
                <br>

                {{ Form::open(array('url' => 'permissions')) }}

                <div class="form-group">
                    {{ Form::label('name', 'Name') }}
                    {{ Form::text('name', '', array('class' => 'form-control')) }}
                </div>
                <br>

                @if(!$roles->isEmpty())

                    <h4>Assign Permission to Roles</h4>

                    @foreach ($roles as $role)
                        {{ Form::checkbox('roles[]',  $role->id ) }}
                        {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                    @endforeach

                @endif

                <br>
                {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}

            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Add Permission")
            $('#rbac').addClass("active")
        });
    </script>
@endsection
