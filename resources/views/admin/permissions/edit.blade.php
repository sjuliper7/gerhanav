@extends('admin.layouts.index')

@section('title', '| Edit Permission')

@section('content')

    <div class="content">
       <div class="container-fluid">
           <div class='col-lg-4 col-lg-offset-4' style="padding: 20px; box-shadow: 0 0px 0.1px rgba(0,0,0,0.6);">

               {{-- @include ('errors.list') --}}

               <br>
               {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}

               <div class="form-group">
                   {{ Form::label('name', 'Permission Name') }}
                   {{ Form::text('name', null, array('class' => 'form-control')) }}
               </div>
               <br>
               {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

               {{ Form::close() }}

           </div>
       </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Edit Permissions")
            $('#rbac').addClass("active")
        });
    </script>

@endsection
