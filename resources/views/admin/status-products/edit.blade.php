@extends('admin.layouts.index')

@section('title', '| Edit Status Product')


@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2" style="padding: 20px; box-shadow: 0 0px 1px rgba(0,0,0,0.6);">
                    <hr>

                    <form action="{{ url('status-products/'.$statusProduct->id) }}" method="post" data-toggle="validator" role="form" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="PUT">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{$statusProduct->name}}" data-error="Please enter name" required>
                            <div class="help-block with-errors"></div>
                        </div>
                        <input type="submit" value="Edit Status Product" class="btn btn-success btn-lg btn-block" id="add" style="margin-top: 70px;">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#brand-title').text("Edit Status Product")
            $('#product').addClass("active")
        });
    </script>

@endsection


