@extends('layouts.index-for-product')

@section('content')
    <!-- Single Product -->

    <div class="single_product">
        <div class="container">
            <div class="row">
                <!-- Images -->
                <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list">
                        @for($i = 1 ; $i< count($images);$i++)
                            <li data-image="{{ asset('images/'.$images[$i]) }}"><img
                                    src="{{ asset('images/'.$images[$i]) }}" id="{{"image".$i}}" onclick="changeImage(this)" alt=""></li>
                        @endfor
                    </ul>
                </div>

                <!-- Selected Image -->
                <div class="col-lg-5 order-lg-2 order-1">
                    <div class="form-row">
                        <div class="image_selected"><img id="image" src="{{ asset('images/'.$images[0]) }}" alt=""></div>
                    </div>
                    {{--<div class="row" style="margin-left: -150px">--}}
                        <div class="form-row" style="font-size: 14px; margin-left: -15px;">
                            Keterangan :
                        </div>
                        <div class="form-row" style="font-size: 14px;margin-left: -15px;">
                            Jika ingin menanyakan informasi lebih lanjut mengenai produk ini silahkan menghubungi:
                        </div>
                        <div class="form-row" style="font-size: 14px;margin-left: -15px;">
                            No.Hp :{{$product->store->store_phone}}
                        </div>
                        <div class="form-row" style="font-size: 14px;margin-left: -15px;">
                            Email :{{$product->store->store_email}}
                        </div>
                    {{--</div>--}}
                </div>

                <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">




                    <!-- Description -->
                <div class="col-lg-5 order-3">
                    <div class="container">
                        <div class="form-row">
                            <div class="product_name">{{$product->name}}</div>
                        </div>
                        <div class="form-row">
                            @for ($i=1; $i <= 5 ; $i++)
                                <span class="fa fa-star{{ ($i <= $product->rating) ? '' : '-o'}}" style="color: #ffca08"></span>
                            @endfor
                        </div>
                        <div class="form-row">
                            <label style="margin-right: 10px"><a href="{{url('/products-by/'.$product->category->name)}}"><p class="badge badge-success">{{$product->category->name}}</p></a></label>
                            <label><a href="{{url('/store/'.$product->store->store_name)}}"><p class="badge badge-success">{{$product->store->store_name}}</p></a></label>
                        </div>
                        <div class="form-row">
                            <label>Penjelasan <p>{!! $desc !!} <br><a data-toggle="modal" data-target="#myModal"> Read More</a> </p></label>
                            <!-- The Modal -->
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{$product->name}}</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            {!! $product->description !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <label>Cerita <p>{!! $story!!}<br> <a data-toggle="modal" data-target="#myModalStory"> Read More</a> </p></label>

                            <!-- The Modal -->
                            <div class="modal fade" id="myModalStory">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{$product->name}}</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            {!! $product->story !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            @if($product->discount !=0)
                                <label>Harga <h3>Rp.{{$product->price-($product->price*$product->discount/100)}}</h3></label>
                            @else
                                <label>Harga <h3>Rp {{number_format($product->price)}}</h3></label>
                            @endif

                        </div>
                        <div class="form-row">
                            <form action="{{url('/carts')}}" method="POST">
                                {{ csrf_field() }}
                                <input type="text" value="{{$product->id}}"name="id_product"hidden>
                                <div class="form-row">
                                    <label>Jumlah</label>
                                    <input type="number"class="form-control" name="quantity" value="1"max="{{$product->stock}}" min="1">
                                    </div>
                                    <div class="form-row py-1">
                                        <label>Catatan Untuk Penjual</label>
                                        <textarea class="form-control" name="comment" placeholder="Catatan Untuk Penjual"></textarea>
                                    </div>
                                    <div class="form-row py-4">
                                        <input type="submit" value="Tambah Ke Keranjang" class="button cart_button"style="background-color: #8b0000">
                                    </div>
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function changeImage(img) {
            var temp = $('#image').attr('src')
            $("#image").attr('src',img.src)
            img.src = temp
        }
    </script>

    <style>
        @import url(http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

        .starrating > input {display: none;}  /* Remove radio buttons */

        .starrating > label:before {
            content: "\f005"; /* Star */
            margin: 2px;
            font-size: 2em;
            font-family: FontAwesome;
            display: inline-block;
        }

        .starrating > label
        {
            color: #222222; /* Start color when not clicked */
        }

        .starrating > input:checked ~ label
        { color: #ffca08 ; } /* Set yellow color when star checked */

        .starrating > input:hover ~ label
        { color: #ffca08 ;  } /* Set yellow color when star hover */

    </style>
        <link rel="stylesheet" type="text/css" href="{!! asset('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css') !!}">
        <div class="container" style="margin-top: -7em">
            <div class="row">
                <div class="col-lg-2 order-lg-1 order-2"></div>

                <div class="col-lg-8 order-lg-2 order-1" style="margin-left: -12px; box-shadow: 0 2px 6px rgba(0,0,0,.12); min-width: 576px; padding: 10px; margin-bottom: 3em" >
                    <div class="well well-sm">
                        @if(!Auth::guest())
                            @if($check == true)
                                    <div class="text-right">
                                        <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">Berikan Ulasan</a>
                                    </div>
                            @endif
                        @endif


                        <div class="row" id="post-review-box" style="display:none;">
                            <div class="col-md-12">
                                <form accept-charset="UTF-8" action="{{url('reviews')}}" method="post">
                                    {{csrf_field()}}
                                    <input name="id_product" type="hidden" value="{{$product->id}}">
                                    <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5"></textarea>
                                    <div class="starrating risingstar d-flex flex-row-reverse">
                                        <input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="5 star">5</label>
                                        <input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="4 star">4</label>
                                        <input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="3 star">3</label>
                                        <input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="2 star">2</label>
                                        <input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="1 star">1</label>
                                    </div>
                                    <div class="text-right">
                                        <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                            <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                                        <button class="btn btn-success btn-lg" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                            <div class="row">
                                <h3 style="margin-left: 15px">Ulasan</h3>
                            </div>
                       @if(count($reviews) == 0)
                           <hr>
                           <p>Tidak ada ulasan</p>
                       @else
                                @foreach($reviews as $review)
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            @for ($i=1; $i <= 5 ; $i++)
                                                <span class="fa fa-star{{ ($i <= $review->rating) ? '' : '-o'}}" style="color: #ffca08"></span>
                                            @endfor

                                            {{$review->user->name}} <span class="pull-right">{{\Carbon\Carbon::createFromTimestamp(strtotime($review->created_at))->diffForHumans()}}</span>

                                            <p>{{{$review->comment}}}</p>
                                        </div>
                                    </div>
                                @endforeach
                                {{ $reviews->links()}}
                       @endif
                    </div>
                </div>

                <div class="col-lg-2 order-3"></div>
            </div>
        </div>

    </div>



    <script type="text/javascript">
        (function(e){var t,o={className:"autosizejs",append:"",callback:!1,resizeDelay:10},i='<textarea tabindex="-1" style="position:absolute; top:-999px; left:0; right:auto; bottom:auto; border:0; padding: 0; -moz-box-sizing:content-box; -webkit-box-sizing:content-box; box-sizing:content-box; word-wrap:break-word; height:0 !important; min-height:0 !important; overflow:hidden; transition:none; -webkit-transition:none; -moz-transition:none;"/>',n=["fontFamily","fontSize","fontWeight","fontStyle","letterSpacing","textTransform","wordSpacing","textIndent"],s=e(i).data("autosize",!0)[0];s.style.lineHeight="99px","99px"===e(s).css("lineHeight")&&n.push("lineHeight"),s.style.lineHeight="",e.fn.autosize=function(i){return this.length?(i=e.extend({},o,i||{}),s.parentNode!==document.body&&e(document.body).append(s),this.each(function(){function o(){var t,o;"getComputedStyle"in window?(t=window.getComputedStyle(u,null),o=u.getBoundingClientRect().width,e.each(["paddingLeft","paddingRight","borderLeftWidth","borderRightWidth"],function(e,i){o-=parseInt(t[i],10)}),s.style.width=o+"px"):s.style.width=Math.max(p.width(),0)+"px"}function a(){var a={};if(t=u,s.className=i.className,d=parseInt(p.css("maxHeight"),10),e.each(n,function(e,t){a[t]=p.css(t)}),e(s).css(a),o(),window.chrome){var r=u.style.width;u.style.width="0px",u.offsetWidth,u.style.width=r}}function r(){var e,n;t!==u?a():o(),s.value=u.value+i.append,s.style.overflowY=u.style.overflowY,n=parseInt(u.style.height,10),s.scrollTop=0,s.scrollTop=9e4,e=s.scrollTop,d&&e>d?(u.style.overflowY="scroll",e=d):(u.style.overflowY="hidden",c>e&&(e=c)),e+=w,n!==e&&(u.style.height=e+"px",f&&i.callback.call(u,u))}function l(){clearTimeout(h),h=setTimeout(function(){var e=p.width();e!==g&&(g=e,r())},parseInt(i.resizeDelay,10))}var d,c,h,u=this,p=e(u),w=0,f=e.isFunction(i.callback),z={height:u.style.height,overflow:u.style.overflow,overflowY:u.style.overflowY,wordWrap:u.style.wordWrap,resize:u.style.resize},g=p.width();p.data("autosize")||(p.data("autosize",!0),("border-box"===p.css("box-sizing")||"border-box"===p.css("-moz-box-sizing")||"border-box"===p.css("-webkit-box-sizing"))&&(w=p.outerHeight()-p.height()),c=Math.max(parseInt(p.css("minHeight"),10)-w||0,p.height()),p.css({overflow:"hidden",overflowY:"hidden",wordWrap:"break-word",resize:"none"===p.css("resize")||"vertical"===p.css("resize")?"none":"horizontal"}),"onpropertychange"in u?"oninput"in u?p.on("input.autosize keyup.autosize",r):p.on("propertychange.autosize",function(){"value"===event.propertyName&&r()}):p.on("input.autosize",r),i.resizeDelay!==!1&&e(window).on("resize.autosize",l),p.on("autosize.resize",r),p.on("autosize.resizeIncludeStyle",function(){t=null,r()}),p.on("autosize.destroy",function(){t=null,clearTimeout(h),e(window).off("resize",l),p.off("autosize").off(".autosize").css(z).removeData("autosize")}),r())})):this}})(window.jQuery||window.$);
         $(function(){

            $('#new-review').autosize({append: "\n"});

            var reviewBox = $('#post-review-box');
            var newReview = $('#new-review');
            var openReviewBtn = $('#open-review-box');
            var closeReviewBtn = $('#close-review-box');
            var ratingsField = $('#ratings-hidden');

            openReviewBtn.click(function(e)
            {
                reviewBox.slideDown(400, function()
                {
                    $('#new-review').trigger('autosize.resize');
                    newReview.focus();
                });
                openReviewBtn.fadeOut(100);
                closeReviewBtn.show();
            });

            closeReviewBtn.click(function(e)
            {
                e.preventDefault();
                reviewBox.slideUp(300, function()
                {
                    newReview.focus();
                    openReviewBtn.fadeIn(200);
                });
                closeReviewBtn.hide();

            });

            $('.starrr').on('starrr:change', function(e, value){
                ratingsField.val(value);
            });
        });
    </script>

@endsection
