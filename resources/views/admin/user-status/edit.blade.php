@extends('admin.layouts.index')

@section('title', '| Edit User Status')

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2" style="padding: 20px; box-shadow: 0 0px 2px rgba(0,0,0,0.6);">
                    <form action="{{ url('user-status/'.$userStatus->id) }}" method="post" data-toggle="validator" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{$userStatus->name}}" data-error="Please enter name" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <input type="submit" value="Edit User Status" class="btn btn-success btn-lg btn-block" id="add" style="margin-top: 70px;">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Edit User Status")
            $('#rbac').addClass("active")
        });
    </script>
@endsection
