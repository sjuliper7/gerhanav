@extends('admin.layouts.index')

@section('title', '| Create New User Type')

@section('content')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.js"></script>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2" style="padding: 20px; box-shadow: 0 0px 2px rgba(0,0,0,0.6);">
                    <form action="/user-types" method="post" data-toggle="validator" role="form">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name" data-error="Please enter name" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <input type="submit" value="Create User Type" class="btn btn-success btn-lg btn-block" id="add" style="margin-top: 70px;">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Create User Types")
            $('#rbac').addClass("active")
        });
    </script>
@endsection


