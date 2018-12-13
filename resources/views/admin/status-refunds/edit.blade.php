@extends('admin.layouts.index')

@section('title', '| Status Refund')

@section('content')

    <div class="content">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <h1>Edit Status Refund</h1>
                <hr>

                <form action="{{ url('status-refund/'.$statusRefund->id) }}" method="post" data-toggle="validator" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="status" class="form-control" value="{{$statusRefund->status}}" data-error="Please enter name" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <input type="submit" value="Edit Status Refund" class="btn btn-success btn-lg btn-block" id="add" style="margin-top: 70px;">
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Status Refunds")
            $('#product').addClass("active")
        });
    </script>
@endsection
