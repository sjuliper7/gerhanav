@extends('admin.layouts.index')

@section('title', '| Reviews')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="col-lg-12 col-lg-offset-0">
                <h1><i class="fa fa-envelope-open" style="margin-right: 0.5em"></i> Reviews</h1>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Product</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th>Operations</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($reviews as $review)
                            <tr>
                                <td>{{$review->user->name}}</td>
                                <td>{{$review->product->name}}</td>
                                <td>
                                    @for ($i=1; $i <= 5 ; $i++)
                                        <span class="fa fa-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
                                    @endfor
                                </td>
                                <td style="width: 50%"><p class="text-success" id="comment">{{$review->comment}}</p></td>
                                <td width="20%">
                                    @if($review->status == 0)
                                        <form action="{{url('/reviews/'.$review->id)}}"  method="POST">
                                            {{csrf_field()}}
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="col-lg-12">
                                                <div class="form-row form-group">
                                                    <select name="status" class="form-control">
                                                        <option>Tindakan</option>
                                                        <option value="1">Disetujui</option>
                                                        <option value="2">Itu Spam</option>
                                                    </select>
                                                    <input type="submit" value="Ubah" class="btn btn-info">
                                                </div>
                                            </div>

                                        </form>
                                    @elseif($review->status == 1)
                                        <p class="bg-success">Approved</p>
                                    @elseif($review->status == 2)
                                        <p class="bg-danger">it's Spam</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
