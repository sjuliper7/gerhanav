@extends('admin.layouts.index')

@section('title', '| Add User')

@section('content')

   <div class="content">
       <div class="container-fluid">
           <div class='col-lg-4 col-lg-offset-4' style="padding: 20px; box-shadow: 0 0px 2px rgba(0,0,0,0.6);">

               <hr>

               {{-- @include ('errors.list') --}}

               {{ Form::open(array('url' => 'users')) }}

               <div class="form-group">
                   {{ Form::label('name', 'Name') }}
                   {{ Form::text('name', '', array('class' => 'form-control')) }}
               </div>

               <div class="form-group">
                   {{ Form::label('email', 'Email') }}
                   {{ Form::email('email', '', array('class' => 'form-control')) }}
               </div>

               <div class='form-group'>
                   @foreach ($roles as $role)
                       {{ Form::checkbox('roles[]',  $role->id ) }}
                       {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                   @endforeach
               </div>

               <div class="form-group">
                   {{ Form::label('password', 'Password') }}<br>
                   {{ Form::password('password', array('class' => 'form-control')) }}

               </div>

               <div class="form-group">
                   {{ Form::label('password', 'Confirm Password') }}<br>
                   {{ Form::password('password_confirmation', array('class' => 'form-control')) }}

               </div>

               {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

               {{ Form::close() }}

           </div>
       </div>
   </div>
   <script type="text/javascript">
       $(document).ready(function () {
           $('#brand-title').text("Create User")
           $('#rbac').addClass("active")
       });
   </script>
@endsection
