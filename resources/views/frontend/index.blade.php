@extends('frontend.layouts.master')
@section('title','Ecommerce Laravel || HOME PAGE')
@section('main-content')
<style>
    #Gslider .carousel-item{
        position: relative;
    }

    #Gslider .carousel-caption{
        position: absolute;
        right: 50%;
        left: 50%;
        top: 50%;
        bottom: auto;
        transform: translate(-50%, -50%);
        width: min(90%, 720px);
        text-align: center !important;
        display: flex !important;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 0 20px;
        z-index: 2;
    }

    #Gslider .carousel-caption h1,
    #Gslider .carousel-caption p,
    #Gslider .carousel-caption a{
        text-align: center !important;
    }

    #Gslider .carousel-caption h1{
        color: #fff !important;
        text-shadow: 0 4px 18px rgba(0, 0, 0, 0.55);
        font-weight: 800;
        margin-bottom: 16px;
    }

    #Gslider .carousel-caption p{
        display: block !important;
        color: #fff !important;
        text-shadow: 0 4px 18px rgba(0, 0, 0, 0.55);
        font-weight: 600;
        font-size: 28px;
        line-height: 1.35;
        margin-bottom: 20px;
        max-width: 680px;
    }

    #Gslider .carousel-caption .ws-btn{
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-top: 12px;
        padding: 12px 28px;
        background: #ffffff !important;
        color: #111 !important;
        border: none !important;
        border-radius: 999px;
        font-weight: 700;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        opacity: 1 !important;
        visibility: visible !important;
        text-decoration: none !important;
    }

    #Gslider .carousel-caption .ws-btn i{
        margin-left: 8px;
    }
    
    @media(max-width: 768px){
        #Gslider .carousel-caption{
            width: 88%;
        }

        #Gslider .carousel-caption h1{
            margin-bottom: 10px;
        }

        #Gslider .carousel-caption p{
            font-size: 18px;
            margin-bottom: 16px;
        }
    }

    .home-video-section {
        padding: 28px 0 18px;
        background: #f4f7f5;
    }

    .home-video-section .container {
        max-width: 100%;
        padding-left: 0;
        padding-right: 0;
    }

    .home-video-frame {
        width: 100%;
        border-radius: 0;
        overflow: hidden;
        background: #154734;
        box-shadow: none;
    }

    .home-video-frame video {
        width: 100%;
        display: block;
        max-height: 620px;
        object-fit: cover;
    }

    .arrival-ticker {
        background: #154734;
        overflow: hidden;
        padding: 10px 0;
        border-top: 1px solid rgba(255,255,255,0.08);
        border-bottom: 1px solid rgba(255,255,255,0.08);
    }

    .arrival-track {
        display: flex;
        width: max-content;
        animation: arrivalTickerMove 26s linear infinite;
    }

    .arrival-group {
        display: flex;
        align-items: center;
        flex-shrink: 0;
    }

    .arrival-item {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 0 18px;
        color: #fff;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.24em;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .arrival-item span:last-child {
        display: inline-block;
        animation: arrivalTextFlicker 1.8s ease-in-out infinite;
    }

    .arrival-group .arrival-item:nth-child(2n) span:last-child {
        animation-delay: 0.25s;
    }

    .arrival-group .arrival-item:nth-child(3n) span:last-child {
        animation-delay: 0.5s;
    }

    .arrival-group .arrival-item:nth-child(4n) span:last-child {
        animation-delay: 0.75s;
    }

    .arrival-thumb {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        overflow: hidden;
        border: 2px solid rgba(255,255,255,0.32);
        background: rgba(255,255,255,0.12);
        flex-shrink: 0;
    }

    .arrival-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
    }

    @keyframes arrivalTickerMove {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    @keyframes arrivalTextFlicker {
        0%, 100% {
            opacity: 0.45;
            text-shadow: none;
            transform: translateY(0);
        }
        20% {
            opacity: 1;
            text-shadow: 0 0 10px rgba(255,255,255,0.45);
            transform: translateY(-1px);
        }
        40% {
            opacity: 0.55;
            text-shadow: none;
            transform: translateY(0);
        }
        60% {
            opacity: 1;
            text-shadow: 0 0 14px rgba(255,255,255,0.55);
            transform: translateY(-1px);
        }
        80% {
            opacity: 0.7;
            text-shadow: none;
            transform: translateY(0);
        }
    }

    .product-area .single-product {
        height: 100%;
        display: flex;
        flex-direction: column;
        background: #fff;
        box-shadow: 0 14px 30px rgba(15, 81, 50, 0.08);
        transition: transform 0.25s ease, box-shadow 0.25s ease;
    }

    .product-area .single-product .product-img {
        height: 340px;
        overflow: hidden;
        background: #f3f5f4;
    }

    .product-area .single-product .product-img a {
        display: block;
        height: 100%;
    }

    .product-area .single-product .product-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transform: scale(1);
        transition: transform 0.65s cubic-bezier(0.22, 1, 0.36, 1);
        will-change: transform;
    }

    .product-area .single-product .product-content {
        min-height: 94px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
    }

    .product-area .single-product:hover {
        transform: translateY(-4px);
        box-shadow: 0 22px 42px rgba(15, 81, 50, 0.14);
    }

    .product-area .single-product:hover .product-img img {
        transform: scale(1.03);
    }

    @media(max-width: 768px){
        .product-area .single-product .product-img {
            height: 280px;
        }

        .arrival-item {
            font-size: 11px;
            letter-spacing: 0.16em;
            gap: 10px;
            padding: 0 12px;
        }

        .arrival-thumb {
            width: 34px;
            height: 34px;
        }
    }

    @media(max-width: 576px){
        #Gslider .carousel-inner{
            height: 460px !important;
        }

        #Gslider .carousel-inner img{
            height: 460px;
            object-fit: cover;
            object-position: center;
        }

        #Gslider .carousel-caption{
            width: calc(100% - 34px);
            padding: 0 6px;
            top: 54%;
        }

        #Gslider .carousel-caption h1{
            font-size: 28px !important;
            line-height: 1.15;
            margin-bottom: 12px;
        }

        #Gslider .carousel-caption p{
            font-size: 15px !important;
            line-height: 1.5;
            margin-bottom: 14px;
            max-width: 320px;
        }

        #Gslider .carousel-caption .ws-btn{
            padding: 11px 22px;
            font-size: 13px;
        }

        #Gslider .carousel-control-prev,
        #Gslider .carousel-control-next{
            width: 40px;
        }

        .arrival-ticker{
            padding: 8px 0;
        }

        .arrival-track{
            animation-duration: 22s;
        }

        .home-video-section{
            padding: 18px 0 10px;
        }

        .home-video-frame video{
            max-height: 320px;
        }

        .small-banner.section{
            padding: 28px 0 10px;
        }

        .small-banner .single-banner{
            margin-bottom: 16px;
        }

        .small-banner .single-banner img{
            min-height: 230px;
            object-fit: cover;
        }

        .product-area.section,
        .most-popular.section,
        .shop-home-list.section,
        .shop-blog.section,
        .shop-services.section{
            padding: 38px 0;
        }

        .product-area .section-title,
        .shop-blog .section-title,
        .most-popular .section-title{
            margin-bottom: 22px;
        }

        .product-info .nav-main{
            margin-bottom: 22px;
        }

        .filter-tope-group{
            display: flex;
            flex-wrap: nowrap;
            gap: 10px;
            overflow-x: auto;
            padding-bottom: 6px;
            -webkit-overflow-scrolling: touch;
        }

        .filter-tope-group::-webkit-scrollbar{
            display: none;
        }

        .filter-tope-group .btn{
            flex: 0 0 auto;
            min-width: max-content;
            font-size: 12px;
            padding: 10px 14px;
        }

        .product-area .single-product{
            max-width: 360px;
            margin: 0 auto 18px;
        }

        .product-area .single-product .product-img{
            height: 300px;
        }

        .product-area .single-product .product-content{
            min-height: 88px;
            padding: 14px 14px 16px;
        }

        .midium-banner .single-banner{
            margin-bottom: 18px;
        }

        .midium-banner .single-banner img{
            min-height: 240px;
            object-fit: cover;
        }

        .shop-home-list .single-list{
            margin-bottom: 16px;
        }

        .shop-home-list .single-list .content{
            padding: 16px 10px 6px 0;
        }

        .shop-blog .shop-single-blog{
            margin-bottom: 18px;
        }

        .shop-services .single-service{
            padding: 20px 16px;
            margin-bottom: 14px;
            border-radius: 16px;
            background: #fff;
            box-shadow: 0 12px 28px rgba(15, 81, 50, 0.08);
        }
    }
</style>
<!-- Slider Area -->
@if(count($banners)>0)
    <section id="Gslider" class="carousel slide" data-interval="4000" data-pause="false" data-wrap="true">
        <ol class="carousel-indicators">
            @foreach($banners as $key=>$banner)
        <li data-target="#Gslider" data-slide-to="{{$key}}" class="{{(($key==0)? 'active' : '')}}"></li>
            @endforeach

        </ol>
        <div class="carousel-inner" role="listbox">
                @foreach($banners as $key=>$banner)
                <div class="carousel-item {{(($key==0)? 'active' : '')}}">
                    <img class="first-slide" src="{{$banner->photo}}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>{{$banner->title}}</h1>
                        <p>{!! html_entity_decode($banner->description) !!}</p>
                        <a class="btn btn-lg ws-btn" href="{{route('product-grids')}}" role="button">Shop Now<i class="far fa-arrow-alt-circle-right"></i></i></a>
                    </div>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
    </section>
@endif

@php
    $arrivalTickerProducts = DB::table('products')
        ->where('status', 'active')
        ->whereNotNull('photo')
        ->orderBy('created_at', 'desc')
        ->take(8)
        ->get();
@endphp

@if($arrivalTickerProducts->count() > 0)
<section class="arrival-ticker">
    <div class="arrival-track">
        @for($loopIndex = 0; $loopIndex < 2; $loopIndex++)
            <div class="arrival-group">
                @foreach($arrivalTickerProducts as $arrivalProduct)
                    @php
                        $arrivalPhotos = array_filter(array_map('trim', explode(',', $arrivalProduct->photo)));
                        $arrivalPhoto = count($arrivalPhotos) ? $arrivalPhotos[0] : null;
                    @endphp
                    @if($arrivalPhoto)
                        <div class="arrival-item">
                            <span class="arrival-thumb">
                                <img src="{{ $arrivalPhoto }}" alt="{{ $arrivalProduct->title }}">
                            </span>
                            <span>New Arrival</span>
                        </div>
                    @endif
                @endforeach
            </div>
        @endfor
    </div>
</section>
@endif

<section class="home-video-section">
    <div class="container">
        <div class="home-video-frame">
            <video autoplay muted loop playsinline controls>
                <source src="{{ asset('frontend/videos/home-banner.mp4') }}" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (window.jQuery && $('#Gslider').length) {
            $('#Gslider').carousel({
                interval: 4000,
                pause: false,
                wrap: true,
                keyboard: false
            });
        }
    });
</script>

<!--/ End Slider Area -->

<!-- Start Small Banner  -->
<section class="small-banner section">
    <div class="container-fluid">
        <div class="row">
            @php
            $category_lists=DB::table('categories')->where('status','active')->limit(3)->get();
            @endphp
            @if($category_lists)
                @foreach($category_lists as $cat)
                    @if($cat->is_parent==1)
                        <!-- Single Banner  -->
                        <div class="col-lg-4 col-md-6 col-12">
                            <div class="single-banner">
                                @if($cat->photo)
                                    <img src="{{$cat->photo}}" alt="{{$cat->photo}}">
                                @else
                                    <img src="https://via.placeholder.com/600x370" alt="#">
                                @endif
                                <div class="content">
                                    <h3>{{Helper::displayCategoryName($cat->title)}}</h3>
                                        <a href="{{route('product-cat',$cat->slug)}}">Discover Now</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- /End Single Banner  -->
                @endforeach
            @endif
        </div>
    </div>
</section>
<!-- End Small Banner -->

<!-- Start Product Area -->
<div class="product-area section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>New Items</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-info">
                        <div class="nav-main">
                            <!-- Tab Nav -->
                            <ul class="nav nav-tabs filter-tope-group" id="myTab" role="tablist">
                                @php
                                    $categories=DB::table('categories')->where('status','active')->where('is_parent',1)->get();
                                    // dd($categories);
                                @endphp
                                @if($categories)
                                <button class="btn" style="background:black"data-filter="*">
                                    Recently Added
                                </button>
                                    @foreach($categories as $key=>$cat)

                                    <button class="btn" style="background:none;color:black;"data-filter=".{{$cat->id}}">
                                        {{Helper::displayCategoryName($cat->title)}}
                                    </button>
                                    @endforeach
                                @endif
                            </ul>
                            <!--/ End Tab Nav -->
                        </div>
                        <div class="tab-content isotope-grid" id="myTabContent">
    @php
        $recentlyAddedProducts = DB::table('products')
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->take(8) // Get the 8 most recently added products
            ->get();
    @endphp

    @foreach($recentlyAddedProducts as $key => $product)
        <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{$product->cat_id}}">
            <div class="single-product">
                <div class="product-img">
                    <a href="{{route('product-detail', $product->slug)}}">
                        @php
                            $photos = explode(',', $product->photo);
                        @endphp
                        <img class="default-img" src="{{$photos[0]}}" alt="{{$photos[0]}}">
                        <img class="hover-img" src="{{$photos[0]}}" alt="{{$photos[0]}}">
                        @if($product->stock <= 0)
                            <span class="out-of-stock">Sold Out</span>
                        @elseif($product->condition == 'new')
                            <span class="new">New</span>
                        @elseif($product->condition == 'hot')
                            <span class="hot">Hot</span>
                        @else
                            <span class="price-dec">{{$product->discount}}% Off</span>
                        @endif
                    </a>
                    <div class="button-head">
                        <div class="product-action">
                            <a data-toggle="modal" data-target="#{{$product->id}}" title="Quick View" href="#"><i class="ti-eye"></i><span>Quick Shop</span></a>
                            <a title="Wishlist" href="{{route('add-to-wishlist', $product->slug)}}"><i class="ti-heart"></i><span>Add to Wishlist</span></a>
                        </div>
                        <div class="product-action-2">
                            <a title="Add to cart" href="{{route('add-to-cart', $product->slug)}}">Add to cart</a>
                        </div>
                    </div>
                </div>
                <div class="product-content">
                    <h3><a href="{{route('product-detail', $product->slug)}}">{{$product->title}}</a></h3>
                    @php
                        $after_discount = ($product->price - ($product->price * $product->discount) / 100);
                    @endphp
                    <div class="product-price">
                        <span>${{number_format($after_discount, 2)}}</span>
                        <del style="padding-left: 4%;">${{number_format($product->price, 2)}}</del>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
                    </div>
                </div>
            </div>
        </div>
</div>
<!-- End Product Area -->
{{-- @php
    $featured=DB::table('products')->where('is_featured',1)->where('status','active')->orderBy('id','DESC')->limit(1)->get();
@endphp --}}
<!-- Start Midium Banner  -->
<section class="midium-banner">
    <div class="container">
        <div class="row">
            @if($featured)
                @foreach($featured as $data)
                    <!-- Single Banner  -->
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="single-banner">
                            @php
                                $photo=explode(',',$data->photo);
                            @endphp
                            <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                            <div class="content">
                                <p>{{$data->cat_info['title']}}</p>
                                <h3>{{$data->title}} <br>Up to<span> {{$data->discount}}%</span></h3>
                                <a href="{{route('product-detail',$data->slug)}}">Shop Now</a>
                            </div>
                        </div>
                    </div>
                    <!-- /End Single Banner  -->
                @endforeach
            @endif
        </div>
    </div>
</section>
<!-- End Midium Banner -->

<!-- Start Most Popular -->
<div class="product-area most-popular section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Hot Item</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="owl-carousel popular-slider">
                    @foreach($product_lists as $product)
                        @if($product->condition=='hot')
                            <!-- Start Single Product -->
                        <div class="single-product">
                            <div class="product-img">
                                <a href="{{route('product-detail',$product->slug)}}">
                                    @php
                                        $photo=explode(',',$product->photo);
                                    // dd($photo);
                                    @endphp
                                    <img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                    <img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                    {{-- <span class="out-of-stock">Hot</span> --}}
                                </a>
                                <div class="button-head">
                                    <div class="product-action">
                                        <a data-toggle="modal" data-target="#{{$product->id}}" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                        <a title="Wishlist" href="{{route('add-to-wishlist',$product->slug)}}" ><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                    </div>
                                    <div class="product-action-2">
                                        <a href="{{route('add-to-cart',$product->slug)}}">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="product-content">
                                <h3><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h3>
                                <div class="product-price">
                                    <span class="old">${{number_format($product->price,2)}}</span>
                                    @php
                                    $after_discount=($product->price-($product->price*$product->discount)/100)
                                    @endphp
                                    <span>${{number_format($after_discount,2)}}</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Most Popular Area -->

<!-- Start Shop Home List  -->
<section class="shop-home-list section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="shop-section-title">
                            <h1>Latest Items</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php
                        $product_lists=DB::table('products')->where('status','active')->orderBy('id','DESC')->limit(6)->get();
                    @endphp
                    @foreach($product_lists as $product)
                        <div class="col-md-4">
                            <!-- Start Single List  -->
                            <div class="single-list">
                                <div class="row">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <div class="list-image overlay">
                                        @php
                                            $photo=explode(',',$product->photo);
                                            // dd($photo);
                                        @endphp
                                        <img src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                        <a href="{{route('add-to-cart',$product->slug)}}" class="buy"><i class="fa fa-shopping-bag"></i></a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-12 no-padding">
                                    <div class="content">
                                        <h4 class="title"><a href="{{route('product-detail',$product->slug)}}">{{$product->title}}</a></h4>
                                        <p class="price with-discount">{{number_format($product->discount,2)}}% OFF</p>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- End Single List  -->
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop Home List  -->

<!-- Start Shop Blog  -->
<section class="shop-blog section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>From Our Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @if($posts)
                @foreach($posts as $post)
                    <div class="col-lg-4 col-md-6 col-12">
                        <!-- Start Single Blog  -->
                        <div class="shop-single-blog">
                            <img src="{{$post->photo}}" alt="{{$post->photo}}">
                            <div class="content">
                                <p class="date">{{$post->created_at->format('d M , Y. D')}}</p>
                                <a href="{{route('blog.detail',$post->slug)}}" class="title">{{$post->title}}</a>
                                <a href="{{route('blog.detail',$post->slug)}}" class="more-btn">Continue Reading</a>
                            </div>
                        </div>
                        <!-- End Single Blog  -->
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</section>
<!-- End Shop Blog  -->

<!-- Start Shop Services Area -->
<section class="shop-services section home">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-rocket"></i>
                    <h4>Free shiping</h4>
                    <p>Orders over $100</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-reload"></i>
                    <h4>Free Return</h4>
                    <p>Within 30 days returns</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-lock"></i>
                    <h4>Sucure Payment</h4>
                    <p>100% secure payment</p>
                </div>
                <!-- End Single Service -->
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Service -->
                <div class="single-service">
                    <i class="ti-tag"></i>
                    <h4>Best Peice</h4>
                    <p>Guaranteed price</p>
                </div>
                <!-- End Single Service -->
            </div>
        </div>
    </div>
</section>
<!-- End Shop Services Area -->

@include('frontend.layouts.newsletter')

<!-- Modal -->
@if($product_lists)
    @foreach($product_lists as $key=>$product)
        <div class="modal fade" id="{{$product->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                        </div>
                        <div class="modal-body">
                            <div class="row no-gutters">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <!-- Product Slider -->
                                        <div class="product-gallery">
                                            <div class="quickview-slider-active">
                                                @php
                                                    $photo=explode(',',$product->photo);
                                                // dd($photo);
                                                @endphp
                                                @foreach($photo as $data)
                                                    <div class="single-slider">
                                                        <img src="{{$data}}" alt="{{$data}}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    <!-- End Product slider -->
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                    <div class="quickview-content">
                                        <h2>{{$product->title}}</h2>
                                        <div class="quickview-ratting-review">
                                            <div class="quickview-ratting-wrap">
                                                <div class="quickview-ratting">
                                                    {{-- <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="yellow fa fa-star"></i>
                                                    <i class="fa fa-star"></i> --}}
                                                    @php
                                                        $rate=DB::table('product_reviews')->where('product_id',$product->id)->avg('rate');
                                                        $rate_count=DB::table('product_reviews')->where('product_id',$product->id)->count();
                                                    @endphp
                                                    @for($i=1; $i<=5; $i++)
                                                        @if($rate>=$i)
                                                            <i class="yellow fa fa-star"></i>
                                                        @else
                                                        <i class="fa fa-star"></i>
                                                        @endif
                                                    @endfor
                                                </div>
                                                <a href="#"> ({{$rate_count}} customer review)</a>
                                            </div>
                                            <div class="quickview-stock">
                                                @if($product->stock >0)
                                                <span><i class="fa fa-check-circle-o"></i> {{$product->stock}} in stock</span>
                                                @else
                                                <span><i class="fa fa-times-circle-o text-danger"></i> {{$product->stock}} out stock</span>
                                                @endif
                                            </div>
                                        </div>
                                        @php
                                            $after_discount=($product->price-($product->price*$product->discount)/100);
                                        @endphp
                                        <h3><small><del class="text-muted">${{number_format($product->price,2)}}</del></small>    ${{number_format($after_discount,2)}}  </h3>
                                        <div class="quickview-peragraph">
                                            <p>{!! html_entity_decode($product->summary) !!}</p>
                                        </div>
                                        @if($product->size)
                                            <div class="size">
                                                <div class="row">
                                                    <div class="col-lg-6 col-12">
                                                        <h5 class="title">Size</h5>
                                                        <select>
                                                            @php
                                                            $sizes=explode(',',$product->size);
                                                            // dd($sizes);
                                                            @endphp
                                                            @foreach($sizes as $size)
                                                                <option>{{$size}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    {{-- <div class="col-lg-6 col-12">
                                                        <h5 class="title">Color</h5>
                                                        <select>
                                                            <option selected="selected">orange</option>
                                                            <option>purple</option>
                                                            <option>black</option>
                                                            <option>pink</option>
                                                        </select>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        @endif
                                        <form action="{{route('single-add-to-cart')}}" method="POST" class="mt-4">
                                            @csrf
                                            <div class="quantity">
                                                <!-- Input Order -->
                                                <div class="input-group">
                                                    <div class="button minus">
                                                        <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                                            <i class="ti-minus"></i>
                                                        </button>
                                                    </div>
													<input type="hidden" name="slug" value="{{$product->slug}}">
                                                    <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
                                                    <div class="button plus">
                                                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                                            <i class="ti-plus"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!--/ End Input Order -->
                                            </div>
                                            <div class="add-to-cart">
                                                <button type="submit" class="btn">Add to cart</button>
                                                <a href="{{route('add-to-wishlist',$product->slug)}}" class="btn min"><i class="ti-heart"></i></a>
                                            </div>
                                        </form>
                                        <div class="default-social">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    @endforeach
@endif
<!-- Modal end -->
@endsection

@push('styles')
    <style>
        /* Banner Sliding */
        #Gslider .carousel-inner {
        background: #eef2ef;
        color:black;
        }

        #Gslider .carousel-inner{
        height: 550px;
        overflow:hidden;
        }
        #Gslider .carousel-inner img{
            width: 100% !important;
            height: 100%;
            object-fit: cover;
            opacity: 1;
        }

        #Gslider .carousel-inner .carousel-caption {
        bottom: 60%;
        }

        #Gslider .carousel-inner .carousel-caption h1 {
        font-size: 50px;
        font-weight: bold;
        line-height: 100%;
        /* color: #F7941D; */
        color: #1e1e1e;
        }

        #Gslider .carousel-inner .carousel-caption p {
        font-size: 18px;
        color: black;
        margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
        bottom: 70px;
        }

        #Gslider .carousel-item {
        transition: transform .8s ease-in-out;
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        will-change: transform;
        }

        #Gslider .carousel-item img {
        backface-visibility: hidden;
        -webkit-backface-visibility: hidden;
        transform: translateZ(0);
        will-change: transform;
        }
    </style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>

        /*==================================================================
        [ Isotope ]*/
        var $topeContainer = $('.isotope-grid');
        var $filter = $('.filter-tope-group');

        // filter items on button click
        $filter.each(function () {
            $filter.on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $topeContainer.isotope({filter: filterValue});
            });

        });

        // init Isotope
        $(window).on('load', function () {
            var $grid = $topeContainer.each(function () {
                $(this).isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    animationEngine : 'best-available',
                    masonry: {
                        columnWidth: '.isotope-item'
                    }
                });
            });
        });

        var isotopeButton = $('.filter-tope-group button');

        $(isotopeButton).each(function(){
            $(this).on('click', function(){
                for(var i=0; i<isotopeButton.length; i++) {
                    $(isotopeButton[i]).removeClass('how-active1');
                }

                $(this).addClass('how-active1');
            });
        });
    </script>
    <script>
         function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen||el.webkitCancelFullScreen||el.mozCancelFullScreen||el.exitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el.msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }
    </script>

@endpush
