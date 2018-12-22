@extends('admin.layouts.index')

@section('title', '| Refund Product')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h1>Create New Status</h1>
                <hr>

                <form action="/status-refund" method="post" data-toggle="validator" role="form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="status" class="form-control" placeholder="Status" data-error="Please enter name" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <input type="submit" value="Create Status" class="btn btn-success btn-lg btn-block" id="add" style="margin-top: 70px;">
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Refund Products")
            $('#product').addClass("active")
        });
    </script>
@endsection
