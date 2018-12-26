@extends('layouts.index-for-detail')

@section('title', '| Create New Product')

@section('content')
    {{--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>--}}
    {{--<script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.js"></script>--}}
    <script src="{{asset('https://code.jquery.com/jquery-3.2.1.slim.min.js')}}"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js')}}"></script>
    <script src="{{asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js')}}"></script>
    <link href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css')}}" rel="stylesheet">
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js')}}"></script>

    <div class="container py-3">
        <div class="container">
            <h2>Edit Product</h2>
            <hr>
            <form action="{{url('/owner-products/'.$product->id)}}" method="post" id="myForm" data-toggle="validator" role="form" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT">
                {{ csrf_field() }}
                <div class="form-row">
                     <div class="col-md-6">
                         <div class="form-row">
                             <div class="form-group col-md-12">
                                 <label>Nama</label>
                                 <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="nama" data-error="Please enter name" required>
                                 <div class="help-block with-errors"></div>
                             </div>
                         </div>
                         <div class="form-row">
                             <div class="form-group col-md-4">
                                 <label>Harga Awal</label>
                                 <input type="text" name="price" value="{{$product->price}}" class="form-control" placeholder="harga" data-error="Please enter price" required>
                                 <div class="help-block with-errors"></div>
                             </div>
                             <div class="form-group col-md-4">
                                 <label>Discount (%)</label>
                                 <input type="text" name="discount" value="{{$product->discount}}" class="form-control" placeholder="discount" data-error="Please enter price" required>
                                 <div class="help-block with-errors"></div>
                             </div>
                             <div class="form-group col-md-4">
                                 <label>Harga Akhir</label>
                                 <input type="text" value="{{$lastPrice}}"class="form-control" placeholder="discount" data-error="Please enter price"readonly>
                                 <div class="help-block with-errors"></div>
                             </div>
                         </div>
                         <div class="form-row">
                             <div class="form-group col-md-6">
                                 <label>Kategori Produk</label>
                                 <select name="category-select" id="select-category" class="form-control" required style="width: 100%; margin-left:-1px;">
                                     @foreach($categoryProducts as $categoryProduct)
                                         @if($categoryProduct->id == $product->id_category)
                                             <option selected="selected" value="{{$categoryProduct->id}}">{{$categoryProduct->name}}</option>
                                         @endif
                                         <option value="{{$categoryProduct->id}}">{{$categoryProduct->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                             <div class="form-group col-md-6">
                                 <label>Status Produk</label>
                                 <select name="status-select" id="select-status" class="form-control" style="width: 100%;margin-left:-1px;">
                                     @foreach($statusProducts as $statusProduct)
                                         @if($statusProduct->id == $product->id_status)
                                             <option selected="selected" value="{{$statusProduct->id}}">{{$statusProduct->name}}</option>
                                         @endif
                                         <option value="{{$statusProduct->id}}">{{$statusProduct->name}}</option>
                                     @endforeach
                                 </select>
                             </div>
                         </div>
                         <div class="form-row">
                             <div class="form-group col-md-6">
                                 <label>Stok</label>
                                 <input type="text" name="stock" value="{{$product->stock}} " class="form-control" placeholder="stok" data-error="Please enter stock" required>
                                 <div class="help-block with-errors"></div>
                             </div>
                             <div class="form-group col-md-6">
                                 <label>Berat</label>
                                 <input type="text" name="weight" class="form-control" value="{{$product->weight}} " placeholder="berat" data-error="Please enter stock" required>
                                 <div class="help-block with-errors"></div>
                             </div>
                         </div>
                         <div class="form-row">
                             <div class="form-group col-md-12">
                                 <label>Deskripsi</label>
                                 <textarea name="description" id="summernote" class="form-control" rows="4" placeholder="deskripsi" required>{{$product->description}}</textarea>
                             </div>
                         </div>
                         <div class="form-row">
                             <div class="form-group col-md-12">
                                 <label for="comment">Cerita</label>
                                 <textarea class="form-control" rows="5" id="story" name="story" placeholder="cerita" required>{{$product->story}}</textarea>
                             </div>
                         </div>
                         <div style="float: right;margin-bottom: 20px">
                             <input type="button" id="cancel" value="Batal" class="btn btn-danger " style="margin-top: 10px;">
                             <input type="submit" id="add"value="Ubah Produk" class="btn btn-info" style="margin-top: 10px;">
                         </div>

                     </div>


                    <div class="col-md-5" style="margin-left: 40px   ">
                        <div class="form-group">
                            <label>Images</label>
                            <div class="form-row">
                                @for($i = 0; $i<count($images);$i++)
                                    <img src="{{ asset('images/'.$images[$i])  }}" style="max-height:70px;max-width:70px;margin-bottom:10px; margin-right: 20px; object-fit: cover;">
                                @endfor
                            </div>

                            <table class="table" id="dynamic_field">
                                <button type="button" name="addImages" id="more" class="btn btn-success"style="background-color: #8b0000">Ubah Gambar</button>
                            </table>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function () {

            //
            // $('#summernote').summernote({
            //     placeholder: 'Hello bootstrap 4',
            //     tabsize: 2,
            //     height: 100,
            //     width : 550,
            // });
            //
            // $('#story').summernote({
            //     placeholder: 'Buat Story',
            //     tabsize: 2,
            // });


            var i=1;
            $('#more').click(function(){
                i++;
                $('#dynamic_field').append('<tr id="row'+i+'">' +
                    '<td><div class="form-group"><img src="http://placehold.it/400x400" id="show_image-'+i+'" style="max-width:100px;max-height:100px;" class="center-block" /></div></td>'+
                    '<td><label class="btn btn-info">Jelajahi<input type="file" id="input_image-'+i+'" name="images[]" onchange="loadImage(this)" style="display: none"></label></td>' +
                    '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>' +
                    '</tr>');
            });
            $(document).on('click', '.btn_remove', function(){
                var button_id = $(this).attr("id");
                $('#row'+button_id+'').remove();
            });
        });

        function loadImage(input){
            var data = input.id.split("-");
            var variable;
            if(data[1] === ""){
                variable = "#show_image-";
            }else{
                variable = "#show_image-"+ data[1];
            }

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                console.log(variable);
                reader.onload = function(e) {
                    $(variable).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }

        }



    </script>

@endsection


