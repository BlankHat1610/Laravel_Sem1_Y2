@extends('layouts.app')
@section('content')
    <style>
        .product-tab-content{
            overflow: hidden;
        }
        .product-tab-content h2 { font-size: 24px !important;}
        .product-tab-content h3 { font-size: 20px !important;}
        .product-tab-content h4 { font-size: 18px !important;}
        .product-tab-content img{
            display: block;
            margin: 0 auto;
            max-width: 100%;
            text-align: center;
        }
        .list_star i:hover{
            cursor: pointer;
        }
        .list_text{
            display: inline-block;
            margin-left: 10px;
            position: relative;
            background: #52b858;
            color: #fff;
            padding: 2px 8px;
            box-sizing: border-box;
            font-size: 12px;
            border-radius: 2px;
            display: none;
        }
        .list_text:after{
            right: 100%;
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: rgba(82,184,88,0);
            border-right-color: #52b858;
            border-width: 6px;
            margin-top: -6px;
        }
        .list_star .rating_active, .pro-rating .active{
            color: #ff9705;
        }
    </style>
    <!-- breadcrumbs area start -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="home">
                                <a href="/"></a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>Chi tiết sản phẩm</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- product-details Area Start -->
    <div class="product-details-area" id="content_product" data-id="{{ $productDetail->id }}">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5 col-xs-12">
                    <div class="zoomWrapper">
                        <div id="img-1" class="zoomWrapper single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{ asset(pare_url_file($productDetail->pro_avatar)) }}" data-zoom-image="{{ pare_url_file($productDetail->pro_avatar) }}" alt="big-1">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                            <ul class="bxslider" id="gallery_01">
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{ asset(pare_url_file($productDetail->pro_avatar)) }}" data-zoom-image="{{ asset(pare_url_file($productDetail->pro_avatar)) }}"><img src="{{ asset(pare_url_file($productDetail->pro_avatar)) }}" alt="zo-th-1" /></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="product-list-wrapper">
                        <div class="single-product">
                            <div class="product-content">
                                <h1 class="product-name"><a href="#">{{ $productDetail->pro_name }}</a></h1>
                                <div class="rating-price">
                                    <?php
                                    $averageDe = 0;

                                    if ($productDetail->pro_total_rating)
                                    {
                                        $averageDe = round($productDetail->pro_total_number / $productDetail->pro_total_rating, 2);
                                    }

                                    ?>
                                    <div class="pro-rating">
                                        @for($i=1; $i<=5; $i++)
                                            <a href=""><i class="fa fa-star {{ $i <= $averageDe ? 'active' : '' }}"></i></a>
                                        @endfor
                                    </div>
                                    <div class="price-boxes">
                                        <span class="new-price">{{ number_format($productDetail->pro_price,0,',','.') }}đ</span>
                                    </div>
                                </div>
                                <div class="product-desc">
                                    <p>{{ $productDetail->pro_description }}</p>
                                </div>
                                <p class="availability in-stock">Availability: <span>In stock</span></p>
                                <div class="actions-e">
                                    <div class="action-buttons-single">
                                        <div class="inputx-content">
                                            <label for="qty">Quantity:</label>
                                            <input type="text" name="qty" id="qty" maxlength="12" value="1" title="Qty" class="input-text qty">
                                        </div>
                                        <div class="add-to-cart">
                                            <a href="{{ route('add.shopping.cart',$productDetail->id) }}">Add to cart</a>
                                        </div>
                                        <div class="add-to-links">
                                            <div class="add-to-wishlist">
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                            </div>
                                            <div class="compare-button">
                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="singl-share">
                                    <a href="#"><img src="{{ asset('img/single-share.png') }}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="single-product-tab">
                      <!-- Nav tabs -->
                    <ul class="details-tab">
                        <li class="active"><a href="#home" data-toggle="tab">Chi tiết sản phẩm</a></li>
                    </ul>
                      <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <div class="product-tab-content">
                                {!! $productDetail->pro_content !!}
                            </div>
                            <hr>
                        </div>
                        <div class="component_rating" style="margin: 20px 0;">
                            <h3>Đánh giá sản phẩm</h3>
                            <div class="component_rating_content" style="display: flex; align-items: center; border-radius: 5px; border: 1px solid #dedede;">
                                <div class="rating_item" style="width: 20%; position: relative;">
                                    <span class="fa fa-star" style="font-size: 100px; display: block; color: #ff9705; margin: 0 auto; text-align: center;"></span><strong style="position: absolute; top: 50%; left: 50%; transform: translate(-50%,-50%);font-size: 20px; color: white;"> {{ $averageDe }}</strong>
                                </div>
                                <div class="list_rating" style="width: 60%; padding: 20px;">
                                @foreach($arrayRatings as $key => $arrayRating)
                                    <?php
                                        $itemAvg = round(($arrayRating['total'] / $productDetail->pro_total_rating) * 100,0);
                                    ?>
                                    <div class="item_rating" style="display: flex; align-items: center;">
                                        <div style="width: 5%; font-size: 14px;">
                                            {{ $key }} <span class="fa fa-star"></span>
                                        </div>
                                        <div style="width: 75%; margin: 0 20px;">
                                            <span style="width: 100%; height: 8px; display: block; border: 1px solid #dedede; background-color: #dedede; border-radius: 5px;">
                                                <strong style="width: {{ $itemAvg }}%; background-color: #f25800; display: block; border-radius: 5px; height: 100%;"></strong>
                                            </span>
                                        </div>
                                        <div style="width: 20%">
                                            <a href=""> {{ $arrayRating['total'] }} đánh giá ({{ $itemAvg }}%)</a>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                                <div class="" style="width: 20%;">
                                    <a href="" class="js_rating_action" style="width: 200px; background-color: #0f99de; padding: 10px; color: white; border-radius: 5px;"> Gửi đánh giá của bạn</a>
                                </div>
                            </div>
                            <div class="form_rating hidden">
                                <div style="display: flex; margin-top: 15px; font-size: 15px;">
                                    <p style="margin-bottom: 0;">Chọn đánh giá của bạn</p>
                                    <span style="margin: 0 15px; " class="list_star">
                                    @for($i = 1; $i <= 5; $i++)
                                            <i class="fa fa-star" data-key="{{ $i }}"></i>
                                    @endfor
                                    </span>
                                    <span class="list_text"></span>
                                    <input type="hidden" value="" class="number_rating">
                                </div>
                                <div style="margin-top: 15px;">
                                    <textarea name="" class="form-control " id="r_content" cols="30" rows="3"></textarea>
                                </div>
                                <div style="margin-top: 15px;">
                                    <a href="{{ route('post.rating.product',$productDetail->id) }}" class="js_rating_product" style="width: 200px; background: #0f99de; padding: 8px 18px; color: white; border-radius: 5px;">Gửi đánh giá</a>
                                </div>
                            </div>
                        </div>
                        <div class="component_list_rating">
                            @if($ratings)
                                @foreach($ratings as $rating)
                                    <div class="rating_item" style="margin: 10px 0;">
                                        <div>
                                            <span style="color: #333; font-weight: bold; text-transform: capitalize;">{{ isset($rating->user->name) ? $rating->user->name : 'Unknown' }}</span>
                                            <a href="" style="color: #2ba832;"> <i class="fa fa-check-circle-o"></i> Đã mua hàng tại website</a>
                                        </div>
                                        <p style="margin-bottom: 0;">
                                            <span class="pro-rating">
                                                @for($i=1; $i<=5; $i++)
                                                    <i class="fa fa-star {{ $i <= $rating->ra_number ? 'active' : '' }}"></i>
                                                @endfor
                                            </span>
                                            <span>{{ $rating->ra_content }}</span>
                                        </p>
                                        <div>
                                            <span><i class="fa fa-clock-o"></i> {{ $rating->created_at }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- product-details Area end -->
    <!-- product section start -->
{{--    <div class="our-product-area new-product">--}}
{{--        <div class="container">--}}
{{--            <div class="area-title">--}}
{{--                <h2>New products</h2>--}}
{{--            </div>--}}
{{--            <!-- our-product area start -->--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-12">--}}
{{--                    <div class="row">--}}
{{--                        <div class="features-curosel">--}}
{{--                            <!-- single-product start -->--}}
{{--                            <div class="col-lg-12 col-md-12">--}}
{{--                                <div class="single-product first-sale">--}}
{{--                                    <div class="product-img">--}}
{{--                                        <a href="#">--}}
{{--                                            <img class="primary-image" src="{{ asset('img/products/product-1.jpg') }}" alt="" />--}}
{{--                                            <img class="secondary-image" src="{{ asset('img/products/product-2.jpg') }}" alt="" />--}}
{{--                                        </a>--}}
{{--                                        <div class="action-zoom">--}}
{{--                                            <div class="add-to-cart">--}}
{{--                                                <a href="#" title="Quick View"><i class="fa fa-search-plus"></i></a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="actions">--}}
{{--                                            <div class="action-buttons">--}}
{{--                                                <div class="add-to-links">--}}
{{--                                                    <div class="add-to-wishlist">--}}
{{--                                                        <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="compare-button">--}}
{{--                                                        <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <div class="quickviewbtn">--}}
{{--                                                    <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="price-box">--}}
{{--                                            <span class="new-price">$200.00</span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="product-content">--}}
{{--                                        <h2 class="product-name"><a href="#">Donec ac tempus</a></h2>--}}
{{--                                        <p>Nunc facilisis sagittis ullamcorper...</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <!-- single-product end -->--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!-- our-product area end -->--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function () {
            let listStar = $(".list_star .fa");
            listRatingText = {
                1 : 'Không thích',
                2 : 'Tạm được',
                3 : 'Bình thường',
                4 : 'Rất tốt',
                5 : 'Tuyệt vời quá',
            };

            listStar.mouseover(function () {
                let $this = $(this);
                let number = $this.attr('data-key');
                listStar.removeClass('rating_active');
                $('.number_rating').val(number);
                $.each(listStar, function (key,value) {
                    if (key + 1 <= number) {

                        $(this).addClass('rating_active')
                    }
                })

                $(".list_text").text('').text(listRatingText[number]).show()

                // console.log($this.attr('data-key'))
            });

            $(".js_rating_action").click(function (event) {
                event.preventDefault();
                if ($(".form_rating").hasClass('hidden')) {
                    $(".form_rating").addClass('active').removeClass('hidden')
                }else {
                    $(".form_rating").addClass('hidden').removeClass('active')
                }
            });

            $(".js_rating_product").click(function (e) {
                e.preventDefault();
                let content = $('#r_content').val();
                let number = $('.number_rating').val();
                let url = $(this).attr('href');

                if (content && number)
                {
                    $.ajax({
                        url : url,
                        type : "POST",
                        data : {
                            number : number,
                            r_content : content
                        }
                    }).done(function (result) {
                        if (result.code == 1) {
                            alert("Gửi đánh giá thành công");
                            location.reload();
                        }
                        else
                            alert("Gửi không thành công , phải đăng nhập");
                            location.reload();
                    });
                }
            });

            // lưu id sản phẩm vào storage
            let idProduct = $("#content_product").attr('data-id');

            // lấy giá trị trong storage
            let products = localStorage.getItem('products');

            if (products == null)
            {
                arrayProduct = new Array();
                arrayProduct.push(idProduct);

                localStorage.setItem('products',JSON.stringify(arrayProduct));
            }else
            {
                // chuyen ve mang
                products = $.parseJSON(products);

                if (products.indexOf(idProduct) == -1)
                {
                    products.push(idProduct);
                    localStorage.setItem('products',JSON.stringify(products))
                }

                console.log(products)
            }

        });
    </script>
@endsection
