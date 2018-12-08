@extends('admin.layouts.index')

@section('title', '| Permissions')

@section('content')

   <div class="content">
       <div class="container">
           <div class="col-lg-10">
               <h1>
                   <a href="{{ route('users.index') }}" class="btn btn-default pull-right" style="margin-bottom: 1em">Users</a>
                   <a href="{{ route('roles.index') }}" class="btn btn-default pull-right" style="margin-bottom: 1em">Roles</a>
               </h1>
               <div class="table-responsive table-hover">
                   <table class="table table-bordered table-striped"     >

                       <thead>
                       <tr>
                           <th>Permissions</th>
                           <th>Operation</th>
                       </tr>
                       </thead>
                       <tbody>
                       @foreach ($permissions as $permission)
                           <tr>
                               <td>{{ $permission->name }}</td>
                               <td>
                                   <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                                   {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id] ]) !!}
                                   {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                   {!! Form::close() !!}

                               </td>
                           </tr>
                       @endforeach
                       </tbody>
                   </table>
               </div>

               <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>

           </div>
       </div>
   </div>

   <script type="text/javascript">
       $(document).ready(function () {
           $('#brand-title').text("Permissions")
           $('#rbac').addClass("active")
       });
   </script>

@endsection
