@extends('frontend.layouts.master')

@section('meta')
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="keywords" content="online shop, purchase, cart, ecommerce site, best online shopping">
	<meta name="description" content="{{$product_detail->summary}}">
	<meta property="og:url" content="{{route('product-detail',$product_detail->slug)}}">
	<meta property="og:type" content="article">
	<meta property="og:title" content="{{$product_detail->title}}">
	<meta property="og:image" content="{{$product_detail->photo}}">
	<meta property="og:description" content="{{$product_detail->description}}">
@endsection
@section('title','Ecommerce Laravel || PRODUCT DETAIL')
@section('main-content')

		<!-- Breadcrumbs -->
		<div class="breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="bread-inner">
							<ul class="bread-list">
								<li><a href="{{route('home')}}">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="">Shop Details</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
		<!-- Shop Single -->
		<section class="shop single section">
					<div class="container">
						@php
							$photo = explode(',', $product_detail->photo);
							$after_discount = ($product_detail->price - (($product_detail->price * $product_detail->discount) / 100));
							$sizes = $product_detail->size ? explode(',', $product_detail->size) : [];
						@endphp
						<div class="row"> 
							<div class="col-12">
								<div class="row">
									<div class="col-lg-7 col-12">
										<div class="product-visuals">
											<div class="product-thumb-strip">
												@foreach($photo as $index => $data)
													<button
														type="button"
														class="product-thumb-item {{ $index === 0 ? 'active' : '' }}"
														data-image="{{$data}}"
														aria-label="Show product image {{ $index + 1 }}"
													>
														<img src="{{$data}}" alt="{{$product_detail->title}}">
													</button>
												@endforeach
											</div>

											<div class="product-main-stage" id="productZoomStage">
												<img id="productMainImage" src="{{$photo[0]}}" alt="{{$product_detail->title}}">
											</div>
										</div>
									</div>
									<div class="col-lg-5 col-12">
										<div class="product-des product-detail-card">
											<div class="short product-detail-copy">
												<p class="product-detail-label">
													{{ optional($product_detail->brand)->title ?? optional($product_detail->cat_info)->title ?? 'Tirochiee Collection' }}
												</p>
												<h4>{{$product_detail->title}}</h4>
												<div class="rating-main">
													<ul class="rating">
														@php
															$rate=ceil($product_detail->getReview->avg('rate'))
														@endphp
															@for($i=1; $i<=5; $i++)
																@if($rate>=$i)
																	<li><i class="fa fa-star"></i></li>
																@else 
																	<li><i class="fa fa-star-o"></i></li>
																@endif
															@endfor
													</ul>
													<a href="#" class="total-review">({{$product_detail['getReview']->count()}}) Review</a>
                                                </div>
												<p class="price product-detail-price">
													<span class="discount">${{number_format($after_discount,2)}}</span>
													@if($product_detail->discount > 0)
														<s>${{number_format($product_detail->price,2)}}</s>
													@endif
												</p>
												<p class="product-tax-note">Inclusive of all taxes</p>
												<p class="description">{!!($product_detail->summary)!!}</p>
											</div>

											<div class="product-buy product-buy-panel">
												<form action="{{route('single-add-to-cart')}}" method="POST">
													@csrf 
													@if(count($sizes))
														<input type="hidden" name="product_size" id="selectedProductSize" value="{{$sizes[0]}}">
													@endif
													@if(count($sizes))
														<div class="size mt-4 product-size-block">
															<h4>Size:</h4>
															<div class="product-size-grid compact">
																@foreach($sizes as $index => $size)
																	<button
																		type="button"
																		class="product-size-option {{ $index === 0 ? 'active' : '' }}"
																		data-size="{{$size}}"
																	>
																		{{$size}}
																	</button>
																@endforeach
															</div>
														</div>
													@endif

													<div class="quantity product-qty-wrap">
														<h6>Quantity</h6>
														<div class="input-group product-qty-group">
															<div class="button minus">
																<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
																	<i class="ti-minus"></i>
																</button>
															</div>
															<input type="hidden" name="slug" value="{{$product_detail->slug}}">
															<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1" id="quantity">
															<div class="button plus">
																<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
																	<i class="ti-plus"></i>
																</button>
															</div>
														</div>
													</div>

													<div class="add-to-cart mt-4 product-action-stack">
														<button type="submit" class="btn product-add-cart-btn">Add To Cart</button>
													</div>
													<div class="product-buy-now-wrap">
														<button type="submit" name="buy_now" value="1" class="btn product-buy-now-btn">Buy Now</button>
													</div>
													<div class="product-utility-row">
														<a href="{{route('add-to-wishlist',$product_detail->slug)}}" class="product-inline-link"><i class="ti-heart"></i> Add to Wishlist</a>
													</div>
												</form>

												<p class="cat">Category : <a href="{{route('product-cat',$product_detail->cat_info['slug'])}}">{{Helper::displayCategoryName($product_detail->cat_info['title'])}}</a></p>
												@if($product_detail->sub_cat_info)
												<p class="cat mt-1">Sub Category : <a href="{{route('product-sub-cat',[$product_detail->cat_info['slug'],$product_detail->sub_cat_info['slug']])}}">{{Helper::displayCategoryName($product_detail->sub_cat_info['title'])}}</a></p>
												@endif
												<p class="availability"> Stock: 
													@if($product_detail->stock > 0)
														@if($product_detail->stock < 5)
															<span class="badge badge-warning">Low in stock</span>
														@else
															<span class="badge badge-success">Available</span>
														@endif
													@else
														<span class="badge badge-danger">Out of stock</span>
													@endif
												</p>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12">
										<div class="product-info">
											<div class="nav-main">
												<!-- Tab Nav -->
												<ul class="nav nav-tabs" id="myTab" role="tablist">
													<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a></li>
													<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Reviews</a></li>
												</ul>
												<!--/ End Tab Nav -->
											</div>
											<div class="tab-content" id="myTabContent">
												<!-- Description Tab -->
												<div class="tab-pane fade show active" id="description" role="tabpanel">
													<div class="tab-single">
														<div class="row">
															<div class="col-12">
																<div class="single-des">
																	<p>{!! ($product_detail->description) !!}</p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!--/ End Description Tab -->
												<!-- Reviews Tab -->
												<div class="tab-pane fade" id="reviews" role="tabpanel">
													<div class="tab-single review-panel">
														<div class="row">
															<div class="col-12">
																
																<!-- Review -->
																<div class="comment-review">
																	<div class="add-review">
																		<h5>Add A Review</h5>
																		<p>Your email address will not be published. Required fields are marked</p>
																	</div>
																	<h4>Your Rating <span class="text-danger">*</span></h4>
																	<div class="review-inner">
																			<!-- Form -->
																@auth
																<form class="form" method="post" action="{{route('review.store',$product_detail->slug)}}">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-lg-12 col-12">
                                                                            <div class="rating_box">
                                                                                  <div class="star-rating">
                                                                                    <div class="star-rating__wrap">
                                                                                      <input class="star-rating__input" id="star-rating-5" type="radio" name="rate" value="5">
                                                                                      <label class="star-rating__ico fa fa-star-o" for="star-rating-5" title="5 out of 5 stars"></label>
                                                                                      <input class="star-rating__input" id="star-rating-4" type="radio" name="rate" value="4">
                                                                                      <label class="star-rating__ico fa fa-star-o" for="star-rating-4" title="4 out of 5 stars"></label>
                                                                                      <input class="star-rating__input" id="star-rating-3" type="radio" name="rate" value="3">
                                                                                      <label class="star-rating__ico fa fa-star-o" for="star-rating-3" title="3 out of 5 stars"></label>
                                                                                      <input class="star-rating__input" id="star-rating-2" type="radio" name="rate" value="2">
                                                                                      <label class="star-rating__ico fa fa-star-o" for="star-rating-2" title="2 out of 5 stars"></label>
                                                                                      <input class="star-rating__input" id="star-rating-1" type="radio" name="rate" value="1">
																					  <label class="star-rating__ico fa fa-star-o" for="star-rating-1" title="1 out of 5 stars"></label>
																					  @error('rate')
																						<span class="text-danger">{{$message}}</span>
																					  @enderror
                                                                                    </div>
                                                                                  </div>
                                                                            </div>
                                                                        </div>
																		<div class="col-lg-12 col-12">
																			<div class="form-group">
																				<label>Write a review</label>
																				<textarea name="review" rows="6" placeholder="" ></textarea>
																			</div>
																		</div>
																		<div class="col-lg-12 col-12">
																			<div class="form-group button5">	
																				<button type="submit" class="btn">Submit</button>
																			</div>
																		</div>
																	</div>
																</form>
																@else 
																<p class="text-center p-5">
																	You need to <a href="{{route('login.form')}}" style="color:rgb(54, 54, 204)">Login</a> OR <a style="color:blue" href="{{route('register.form')}}">Register</a>

																</p>
																<!--/ End Form -->
																@endauth
																	</div>
																</div>
															
																<div class="ratting-main">
																	<div class="avg-ratting">
																		{{-- @php 
																			$rate=0;
																			foreach($product_detail->rate as $key=>$rate){
																				$rate +=$rate
																			}
																		@endphp --}}
																		<h4>{{ceil($product_detail->getReview->avg('rate'))}} <span>(Overall)</span></h4>
																		<span>Based on {{$product_detail->getReview->count()}} Comments</span>
																	</div>
																	@foreach($product_detail['getReview'] as $data)
																	<!-- Single Rating -->
																	<div class="single-rating">
																		<div class="rating-author">
																			@if($data->user_info['photo'])
																			<img src="{{$data->user_info['photo']}}" alt="{{$data->user_info['photo']}}">
																			@else 
																			<img src="{{asset('backend/img/avatar.png')}}" alt="Profile.jpg">
																			@endif
																		</div>
																		<div class="rating-des">
																			<h6>{{$data->user_info['name']}}</h6>
																			<div class="ratings">

																				<ul class="rating">
																					@for($i=1; $i<=5; $i++)
																						@if($data->rate>=$i)
																							<li><i class="fa fa-star"></i></li>
																						@else 
																							<li><i class="fa fa-star-o"></i></li>
																						@endif
																					@endfor
																				</ul>
																				<div class="rate-count">(<span>{{$data->rate}}</span>)</div>
																			</div>
																			<p>{{$data->review}}</p>
																		</div>
																	</div>
																	<!--/ End Single Rating -->
																	@endforeach
																</div>
																
																<!--/ End Review -->
																
															</div>
														</div>
													</div>
												</div>
												<!--/ End Reviews Tab -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
		</section>
		<!--/ End Shop Single -->
		<!-- Visit 'codeastro' for more projects -->
		<!-- Start Most Popular -->
	<div class="product-area most-popular related-product section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Related Products</h2>
					</div>
				</div>
            </div>
            <div class="row">
                {{-- {{$product_detail->rel_prods}} --}}
                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                        @foreach($product_detail->rel_prods as $data)
                            @if($data->id !==$product_detail->id)
                                <!-- Start Single Product -->
                                <div class="single-product">
                                    <div class="product-img">
										<a href="{{route('product-detail',$data->slug)}}">
											@php 
												$photo=explode(',',$data->photo);
											@endphp
                                            <img class="default-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                            <img class="hover-img" src="{{$photo[0]}}" alt="{{$photo[0]}}">
                                            <span class="price-dec">{{$data->discount}} % Off</span>
                                                                    {{-- <span class="out-of-stock">Hot</span> --}}
                                        </a>
                                        <div class="button-head">
                                            <div class="product-action">
                                                <a data-toggle="modal" data-target="#modelExample" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                                <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                            </div>
                                            <div class="product-action-2">
                                                <a title="Add to cart" href="#">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <h3><a href="{{route('product-detail',$data->slug)}}">{{$data->title}}</a></h3>
                                        <div class="product-price">
                                            @php 
                                                $after_discount=($data->price-(($data->discount*$data->price)/100));
                                            @endphp
                                            <span class="old">${{number_format($data->price,2)}}</span>
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
	

  <!-- Modal -->
  <div class="modal fade" id="modelExample" tabindex="-1" role="dialog">
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
                                    <div class="single-slider">
                                        <img src="images/modal1.png" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="images/modal2.png" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="images/modal3.png" alt="#">
                                    </div>
                                    <div class="single-slider">
                                        <img src="images/modal4.png" alt="#">
                                    </div>
                                </div>
                            </div>
                        <!-- End Product slider -->
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                        <div class="quickview-content">
                            <h2>Flared Shift Dress</h2>
                            <div class="quickview-ratting-review">
                                <div class="quickview-ratting-wrap">
                                    <div class="quickview-ratting">
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="yellow fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <a href="#"> (1 customer review)</a>
                                </div>
                                <div class="quickview-stock">
                                    <span><i class="fa fa-check-circle-o"></i> in stock</span>
                                </div>
                            </div>
                            <h3>$29.00</h3>
                            <div class="quickview-peragraph">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia iste laborum ad impedit pariatur esse optio tempora sint ullam autem deleniti nam in quos qui nemo ipsum numquam.</p>
                            </div>
                            <div class="size">
                                <div class="row">
                                    <div class="col-lg-6 col-12">
                                        <h5 class="title">Size</h5>
                                        <select>
                                            <option selected="selected">s</option>
                                            <option>m</option>
                                            <option>l</option>
                                            <option>xl</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <h5 class="title">Color</h5>
                                        <select>
                                            <option selected="selected">orange</option>
                                            <option>purple</option>
                                            <option>black</option>
                                            <option>pink</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="quantity">
                                <!-- Input Order -->
                                <div class="input-group">
                                    <div class="button minus">
                                        <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                            <i class="ti-minus"></i>
                                        </button>
									</div>
                                    <input type="text" name="qty" class="input-number"  data-min="1" data-max="1000" value="1">
                                    <div class="button plus">
                                        <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                            <i class="ti-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <!--/ End Input Order -->
                            </div>
                            <div class="add-to-cart">
                                <a href="#" class="btn">Add to cart</a>
                                <a href="#" class="btn min"><i class="ti-heart"></i></a>
                                <a href="#" class="btn min"><i class="fa fa-compress"></i></a>
                            </div>
                            <div class="default-social">
                                <h4 class="share-now">Share:</h4>
                                <ul>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                    <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal end -->

@endsection
@push('styles')
	<style>
		.product-visuals {
			display: grid;
			grid-template-columns: 84px minmax(0, 1fr);
			gap: 24px;
			align-items: start;
		}

		.product-thumb-strip {
			display: flex;
			flex-direction: column;
			gap: 14px;
		}

		.product-thumb-item {
			width: 84px;
			height: 110px;
			padding: 0;
			border: 1px solid #cad6cf;
			background: #f2f5f3;
			overflow: hidden;
			cursor: pointer;
			transition: all 0.2s ease;
		}

		.product-thumb-item.active {
			border-color: #154734;
			box-shadow: 0 0 0 2px rgba(15, 81, 50, 0.12);
		}

		.product-thumb-item img,
		.product-main-stage img {
			width: 100%;
			height: 100%;
			object-fit: cover;
			display: block;
		}

		.product-main-stage {
			background: #eef2ef;
			min-height: 700px;
			overflow: hidden;
			position: relative;
			cursor: zoom-in;
		}

		.product-main-stage:hover img {
			transform: scale(2);
		}

		.product-main-stage img {
			transition: transform 0.18s ease;
			transform-origin: center center;
		}

		.product-detail-card {
			padding: 18px 8px 18px 28px;
			box-shadow: none !important;
			border: none !important;
		}

		.product-detail-label {
			font-size: 11px;
			letter-spacing: 0.28em;
			text-transform: uppercase;
			color: #6e7b75 !important;
			margin-bottom: 12px;
		}

		.product-detail-copy h4 {
			font-size: 38px;
			line-height: 1.18;
			letter-spacing: 0.08em;
			text-transform: uppercase;
			margin-bottom: 18px;
			color: #24312c !important;
		}

		.product-detail-price {
			display: flex;
			align-items: center;
			gap: 12px;
			font-size: 20px;
			margin-bottom: 6px !important;
		}

		.product-detail-price .discount {
			font-size: 34px !important;
			color: #303733 !important;
			font-weight: 500;
		}

		.product-tax-note {
			font-size: 13px;
			color: #7a8580 !important;
			margin-bottom: 26px !important;
		}

		.product-detail-copy .description {
			font-size: 15px;
			line-height: 1.8;
			color: #596660 !important;
			margin-bottom: 26px !important;
		}

		.product-size-block h4,
		.product-qty-wrap h6 {
			font-size: 16px;
			font-weight: 500;
			margin-bottom: 14px;
			color: #24312c !important;
		}

		.product-size-grid {
			display: flex;
			flex-wrap: wrap;
			gap: 10px;
		}

		.product-size-grid.compact {
			gap: 8px;
		}

		.product-size-option {
			min-width: 56px;
			padding: 9px 12px;
			border: 1px solid #d9d9d9;
			background: #fff !important;
			color: #808080 !important;
			font-size: 14px;
			font-weight: 400;
			cursor: pointer;
			transition: all 0.2s ease;
			border-radius: 0;
		}

		.product-size-option.active {
			border-color: #202020;
			color: #202020 !important;
			box-shadow: none;
		}

		.product-buy-panel {
			margin-top: 30px;
		}

		.product-qty-wrap {
			display: flex;
			flex-direction: column;
			align-items: flex-start;
			gap: 12px;
			margin-top: 22px;
			margin-bottom: 22px;
		}

		.product-qty-group {
			width: 104px;
			margin-bottom: 0;
			border: 1px solid #d9d9d9;
			border-radius: 0;
			box-shadow: none;
		}

		.product-qty-group .btn {
			min-width: 34px;
			height: 34px;
			background: #fff !important;
			color: #444 !important;
			border: none !important;
			box-shadow: none !important;
			padding: 0;
		}

		.product-qty-group .input-number {
			height: 34px;
			border: none;
			text-align: center;
			color: #222;
			font-size: 14px;
			padding: 0;
		}

		.product-action-stack {
			display: block;
			margin-bottom: 14px;
			width: 100%;
		}

		.product-add-cart-btn {
			width: 100% !important;
			display: block;
			height: 46px;
			background: #fff !important;
			color: #3f3f3f !important;
			border: 1px solid #d7d7d7 !important;
			border-radius: 0;
			font-size: 14px;
			font-weight: 500;
			letter-spacing: 0.2em;
			text-transform: uppercase;
			box-shadow: none;
			transition: background 0.2s ease, color 0.2s ease, border-color 0.2s ease;
		}

		.product-add-cart-btn:hover {
			background: #154734 !important;
			color: #fff !important;
			border-color: #154734 !important;
			transform: none;
			box-shadow: none;
		}

		.product-buy-panel .cat,
		.product-buy-panel .availability {
			font-size: 15px;
			color: #596660 !important;
			margin-bottom: 8px;
		}

		.product-buy-now-wrap {
			margin-bottom: 22px;
		}

		.product-buy-now-btn {
			width: 100%;
			height: 46px;
			background: #1f1f1f !important;
			border: 1px solid #1f1f1f !important;
			border-radius: 0;
			color: #fff !important;
			font-size: 14px;
			font-weight: 600;
			letter-spacing: 0.12em;
			text-transform: uppercase;
			box-shadow: none;
			transition: background 0.2s ease, border-color 0.2s ease;
		}

		.product-buy-now-btn:hover {
			background: #111 !important;
			border-color: #111 !important;
			color: #fff !important;
			transform: none;
			box-shadow: none;
		}

		.product-inline-link {
			display: inline-flex;
			align-items: center;
			gap: 8px;
			font-size: 13px;
			color: #6a6a6a !important;
			letter-spacing: 0.04em;
			text-transform: uppercase;
		}

		.product-inline-link:hover {
			color: #222 !important;
		}

		.product-buy-panel .cat a {
			color: #24312c !important;
			font-weight: 500;
		}

		/* Rating */
		.rating_box {
		display: inline-flex;
		}

		.star-rating {
		font-size: 0;
		padding-left: 10px;
		padding-right: 10px;
		}

		.star-rating__wrap {
		display: inline-block;
		font-size: 1rem;
		}

		.star-rating__wrap:after {
		content: "";
		display: table;
		clear: both;
		}

		.star-rating__ico {
		float: right;
		padding-left: 2px;
		cursor: pointer;
		color: #F7941D;
		font-size: 16px;
		margin-top: 5px;
		}

		.star-rating__ico:last-child {
		padding-left: 0;
		}

		.star-rating__input {
		display: none;
		}

		.star-rating__ico:hover:before,
		.star-rating__ico:hover ~ .star-rating__ico:before,
		.star-rating__input:checked ~ .star-rating__ico:before {
		content: "\F005";
		}

		@media (max-width: 991px) {
			.product-visuals {
				grid-template-columns: 1fr;
			}

			.product-thumb-strip {
				order: 2;
				flex-direction: row;
				flex-wrap: wrap;
			}

			.product-main-stage {
				min-height: 480px;
			}

			.product-detail-card {
				padding: 28px 0 0;
			}
		}

		@media (max-width: 575px) {
			.breadcrumbs{
				padding: 10px 0;
			}

			.shop.single.section{
				padding: 24px 0 36px;
			}

			.product-main-stage {
				min-height: 360px;
			}

			.product-thumb-strip{
				gap: 10px;
				overflow-x: auto;
				padding-bottom: 6px;
				flex-wrap: nowrap;
				-webkit-overflow-scrolling: touch;
			}

			.product-thumb-strip::-webkit-scrollbar{
				display: none;
			}

			.product-thumb-item{
				width: 68px;
				height: 88px;
				flex: 0 0 auto;
			}

			.product-detail-copy h4 {
				font-size: 28px;
			}

			.product-detail-price .discount {
				font-size: 28px !important;
			}

			.product-qty-wrap,
			.product-action-stack {
				flex-direction: column;
				align-items: stretch;
			}

			.product-detail-card{
				padding-top: 22px;
			}

			.product-detail-label{
				font-size: 10px;
				letter-spacing: 0.2em;
			}

			.product-detail-price{
				flex-wrap: wrap;
				gap: 8px;
			}

			.product-tax-note,
			.product-detail-copy .description,
			.product-buy-panel .cat,
			.product-buy-panel .availability{
				font-size: 14px;
			}

			.product-size-grid{
				gap: 8px;
			}

			.product-size-option{
				min-width: 48px;
				padding: 8px 10px;
				font-size: 13px;
			}

			.product-qty-group{
				width: 116px;
			}

			.product-add-cart-btn,
			.product-buy-now-btn{
				height: 44px;
				font-size: 13px;
				letter-spacing: 0.14em;
			}

			.product-info .nav-tabs{
				display: flex;
				flex-wrap: nowrap;
				overflow-x: auto;
				-webkit-overflow-scrolling: touch;
			}

			.product-info .nav-tabs::-webkit-scrollbar{
				display: none;
			}

			.product-info .nav-tabs .nav-item{
				flex: 0 0 auto;
			}

			.related-product.section{
				padding-top: 20px;
			}
		}

	</style>
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
	document.addEventListener('DOMContentLoaded', function () {
		const mainImage = document.getElementById('productMainImage');
		const zoomStage = document.getElementById('productZoomStage');
		const thumbs = document.querySelectorAll('.product-thumb-item');
		const sizeButtons = document.querySelectorAll('.product-size-option');
		const selectedSizeInput = document.getElementById('selectedProductSize');

		thumbs.forEach(function (thumb) {
			thumb.addEventListener('click', function () {
				const image = thumb.getAttribute('data-image');
				if (mainImage && image) {
					mainImage.src = image;
					mainImage.style.transformOrigin = 'center center';
				}

				thumbs.forEach(function (item) {
					item.classList.remove('active');
				});

				thumb.classList.add('active');
			});
		});

		sizeButtons.forEach(function (button) {
			button.addEventListener('click', function () {
				sizeButtons.forEach(function (item) {
					item.classList.remove('active');
				});

				button.classList.add('active');

				if (selectedSizeInput) {
					selectedSizeInput.value = button.getAttribute('data-size');
				}
			});
		});

		if (zoomStage && mainImage) {
			zoomStage.addEventListener('mousemove', function (event) {
				const rect = zoomStage.getBoundingClientRect();
				const x = ((event.clientX - rect.left) / rect.width) * 100;
				const y = ((event.clientY - rect.top) / rect.height) * 100;
				mainImage.style.transformOrigin = x + '% ' + y + '%';
			});

			zoomStage.addEventListener('mouseleave', function () {
				mainImage.style.transformOrigin = 'center center';
			});
		}
	});
</script>

    {{-- <script>
        $('.cart').click(function(){
            var quantity=$('#quantity').val();
            var pro_id=$(this).data('id');
            // alert(quantity);
            $.ajax({
                url:"{{route('add-to-cart')}}",
                type:"POST",
                data:{
                    _token:"{{csrf_token()}}",
                    quantity:quantity,
                    pro_id:pro_id
                },
                success:function(response){
                    console.log(response);
					if(typeof(response)!='object'){
						response=$.parseJSON(response);
					}
					if(response.status){
						swal('success',response.msg,'success').then(function(){
							document.location.href=document.location.href;
						});
					}
					else{
                        swal('error',response.msg,'error').then(function(){
							document.location.href=document.location.href;
						});
                    }
                }
            })
        });
    </script> --}}

@endpush
