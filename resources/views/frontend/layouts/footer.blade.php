	<!-- Start Footer Area -->
	<footer class="footer">
		@php
			$settings = DB::table('settings')->get();
		@endphp
		<style>
			.footer{
				background:
					radial-gradient(circle at top left, rgba(21, 71, 52, 0.08), transparent 34%),
					radial-gradient(circle at bottom right, rgba(21, 71, 52, 0.10), transparent 30%),
					linear-gradient(180deg, #f7fbf8 0%, #edf3ef 100%);
			}

			.footer-shell{
				padding: 56px 0 28px;
			}

			.footer-grid{
				display:grid;
				grid-template-columns: 1.5fr 1fr 1fr 1fr;
				gap: 36px;
				align-items:start;
			}

			.footer-card{
				height:100%;
			}

			.footer-about{
				display:flex;
				align-items:flex-start;
				gap:18px;
			}

			.footer-about-logo{
				flex-shrink:0;
				width:72px;
				height:72px;
				display:flex;
				align-items:center;
				justify-content:center;
				border:1px solid rgba(21, 71, 52, 0.10);
				border-radius:18px;
				background:#f8fbf9;
				box-shadow:0 10px 24px rgba(21, 71, 52, 0.06);
			}

			.footer-about-logo img{
				width:46px;
				height:46px;
				object-fit:contain;
				display:block;
			}

			.footer-about-copy{
				flex:1;
			}

			.footer-about-copy .text{
				margin:0 0 16px;
				font-size:15px;
				line-height:1.75;
				color:#42514a !important;
			}

			.footer-about-copy .call{
				margin:0;
				font-size:15px;
				line-height:1.6;
				color:#42514a !important;
			}

			.footer-about-copy .call span{
				display:block;
				margin-top:4px;
			}

			.footer-about-copy .call a{
				font-size:33px;
				font-weight:700;
				color:#154734 !important;
				text-decoration:none;
			}

			.footer-heading{
				margin:0 0 18px;
				font-size:24px;
				font-weight:700;
				color:#163f2b !important;
			}

			.footer-links,
			.footer-contact{
				list-style:none;
				padding:0;
				margin:0;
			}

			.footer-links li,
			.footer-contact li{
				margin-bottom:12px;
				font-size:15px;
				color:#42514a !important;
			}

			.footer-links li:last-child,
			.footer-contact li:last-child{
				margin-bottom:0;
			}

			.footer-links a{
				color:#42514a !important;
				text-decoration:none;
				transition:color 0.2s ease;
			}

			.footer-links a:hover{
				color:#154734 !important;
			}

			.footer-bottom{
				display:flex;
				align-items:center;
				justify-content:space-between;
				gap:24px;
				padding:26px 0 18px;
				border-top:1px solid rgba(21, 71, 52, 0.10);
				margin-top:34px;
			}

			.footer-bottom-note{
				margin:0;
				font-size:15px;
				color:#42514a !important;
			}

			.footer-bottom-payments img{
				max-width:250px;
				width:100%;
				height:auto;
				display:block;
			}

			.footer-wordmark{
				padding:8px 0 6px;
				overflow:hidden;
			}

			.footer-wordmark-text{
				margin:0;
				font-family:'Cinzel', serif;
				font-size:clamp(58px, 10vw, 150px);
				line-height:0.88;
				letter-spacing:0.12em;
				text-transform:uppercase;
				color:#154734;
				text-align:center;
				white-space:nowrap;
				text-shadow:0 16px 34px rgba(21, 71, 52, 0.14), 0 2px 0 rgba(255,255,255,0.75);
			}

			@media(max-width: 991px){
				.footer-grid{
					grid-template-columns: 1fr 1fr;
					gap: 28px;
				}

				.footer-about-copy .call a{
					font-size:28px;
				}
			}

			@media(max-width: 767px){
				.footer-shell{
					padding: 42px 0 22px;
				}

				.footer-grid{
					grid-template-columns: 1fr;
					gap: 26px;
				}

				.footer-about{
					align-items:center;
				}

				.footer-bottom{
					flex-direction:column;
					align-items:flex-start;
				}

				.footer-bottom-payments img{
					max-width:220px;
				}

				.footer-wordmark-text{
					font-size:clamp(46px, 14vw, 86px);
					letter-spacing:0.08em;
				}
			}

			@media(max-width: 575px){
				.footer-shell{
					padding: 34px 0 18px;
				}

				.footer-grid{
					gap: 22px;
				}

				.footer-about{
					flex-direction: column;
					align-items: flex-start;
					gap: 14px;
				}

				.footer-about-logo{
					width: 58px;
					height: 58px;
					border-radius: 16px;
				}

				.footer-about-logo img{
					width: 34px;
					height: 34px;
				}

				.footer-about-copy .text,
				.footer-links li,
				.footer-contact li,
				.footer-bottom-note{
					font-size: 14px;
					line-height: 1.7;
				}

				.footer-about-copy .call{
					font-size: 14px;
				}

				.footer-about-copy .call a{
					font-size: 24px;
					word-break: break-word;
				}

				.footer-heading{
					font-size: 20px;
					margin-bottom: 14px;
				}

				.footer-bottom{
					gap: 14px;
					padding: 22px 0 16px;
				}

				.footer-bottom-payments img{
					max-width: 180px;
				}

				.footer-wordmark{
					padding: 6px 0 2px;
				}

				.footer-wordmark-text{
					font-size: clamp(30px, 13vw, 58px);
					letter-spacing: 0.06em;
					line-height: 0.95;
				}
			}
		</style>

		<div class="footer-shell">
			<div class="container">
				<div class="footer-grid">
					<div class="footer-card">
						<div class="footer-about">
							<div class="footer-about-logo">
								<a href="{{route('home')}}">
									<img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="Tirochiee logo">
								</a>
							</div>
							<div class="footer-about-copy">
								<p class="text">@foreach($settings as $data) {{$data->short_des}} @endforeach</p>
								<p class="call">
									Got Question? Call us 24/7
									<span><a href="tel:@foreach($settings as $data) {{$data->phone}} @endforeach">@foreach($settings as $data) {{$data->phone}} @endforeach</a></span>
								</p>
							</div>
						</div>
					</div>

					<div class="footer-card">
						<h4 class="footer-heading">Information</h4>
						<ul class="footer-links">
							<li><a href="{{route('about-us')}}">About Us</a></li>
							<li><a href="#">Faq</a></li>
							<li><a href="#">Terms &amp; Conditions</a></li>
							<li><a href="{{route('contact')}}">Contact Us</a></li>
							<li><a href="#">Help</a></li>
						</ul>
					</div>

					<div class="footer-card">
						<h4 class="footer-heading">Customer Service</h4>
						<ul class="footer-links">
							<li><a href="#">Payment Methods</a></li>
							<li><a href="#">Money-back</a></li>
							<li><a href="#">Returns</a></li>
							<li><a href="#">Shipping</a></li>
							<li><a href="#">Privacy Policy</a></li>
						</ul>
					</div>

					<div class="footer-card">
						<h4 class="footer-heading">Get In Touch</h4>
						<ul class="footer-contact">
							<li>@foreach($settings as $data) {{$data->address}} @endforeach</li>
							<li>@foreach($settings as $data) {{$data->email}} @endforeach</li>
							<li>@foreach($settings as $data) {{$data->phone}} @endforeach</li>
						</ul>
						<div class="sharethis-inline-follow-buttons"></div>
					</div>
				</div>

				<div class="footer-bottom">
					<p class="footer-bottom-note">© {{date('Y')}} Developed By TIROCHIEE TEAM - All Rights Reserved.</p>
					<div class="footer-bottom-payments">
						<img src="{{asset('backend/img/payments.png')}}" alt="Payment methods">
					</div>
				</div>
			</div>

			<div class="footer-wordmark">
				<h2 class="footer-wordmark-text">TIROCHIEE</h2>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->
 
	<!-- Jquery -->
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-migrate-3.0.0.js')}}"></script>
	<script src="{{asset('frontend/js/jquery-ui.min.js')}}"></script>
	<!-- Popper JS -->
	<script src="{{asset('frontend/js/popper.min.js')}}"></script>
	<!-- Bootstrap JS -->
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<!-- Color JS -->
	<script src="{{asset('frontend/js/colors.js')}}"></script>
	<!-- Slicknav JS -->
	<script src="{{asset('frontend/js/slicknav.min.js')}}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{asset('frontend/js/owl-carousel.js')}}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{asset('frontend/js/magnific-popup.js')}}"></script>
	<!-- Waypoints JS -->
	<script src="{{asset('frontend/js/waypoints.min.js')}}"></script>
	<!-- Countdown JS -->
	<script src="{{asset('frontend/js/finalcountdown.min.js')}}"></script>
	<!-- Nice Select JS -->
	<script src="{{asset('frontend/js/nicesellect.js')}}"></script>
	<!-- Flex Slider JS -->
	<script src="{{asset('frontend/js/flex-slider.js')}}"></script>
	<!-- ScrollUp JS -->
	<script src="{{asset('frontend/js/scrollup.js')}}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{asset('frontend/js/onepage-nav.min.js')}}"></script>
	{{-- Isotope --}}
	<script src="{{asset('frontend/js/isotope/isotope.pkgd.min.js')}}"></script>
	<!-- Easing JS -->
	<script src="{{asset('frontend/js/easing.js')}}"></script>

	<!-- Active JS -->
	<script src="{{asset('frontend/js/active.js')}}"></script>

	
	@stack('scripts')
	<script>
		setTimeout(function(){
		  $('.alert').slideUp();
		},5000);
		$(function() {
			$("ul.dropdown-menu [data-toggle='dropdown']").on("click", function(event) {
				event.preventDefault();
				event.stopPropagation();

				$(this).siblings().toggleClass("show");

				if (!$(this).next().hasClass('show')) {
					$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
				}
				$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
					$('.dropdown-submenu .show').removeClass("show");
				});
			});
		});
	  </script>
