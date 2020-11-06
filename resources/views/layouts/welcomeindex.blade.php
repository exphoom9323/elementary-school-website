	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="{{asset('img/fav.png')}}">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- Site Title -->
		<title>Education</title>

		<link href="https://fonts.googleapis.com/css?family=Kanit:100,200,400,300,500,600,700" rel="stylesheet">
		<!--
			CSS
			============================================= -->
		<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
		<link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">
		<link rel="stylesheet" href="{{asset('css/linearicons.css')}}">
		<link rel="stylesheet" href="{{asset('css/nice-select.css')}}">
		<link rel="stylesheet" href="{{asset('css/animate.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
		<link rel="stylesheet" href="{{asset('css/jquery-ui.css')}}">
		<link rel="stylesheet" href="{{asset('css/main.css')}}">
		@yield('css')
	</head>
	<body {{ Route::currentRouteName() == 'contact' ? 'onload=init();' : '' }}>
		<header id="header" id="home">
			<div class="header-top">
				  			<div class="container">
						  		<div class="row">
						  			<div class="col-lg-6 col-sm-6 col-8 header-top-left no-padding">
						  				<ul>
												<li><a> </a></li>
											<!-- <li><a href="#"><i class="fa fa-graduation-cap"></i></a></li> -->
											<!-- <li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
											<li><a href="#"><i class="fa fa-behance"></i></a></li> -->
						  				</ul>
						  			</div>
						  			<div class="col-lg-6 col-sm-6 col-4 header-top-right no-padding">
						  				<!-- <a href="tel:+953 012 3654 896"><span class="lnr lnr-phone-handset"></span> <span class="text">+953 012 3654 896</span></a>
						  				<a href="mailto:support@colorlib.com"><span class="lnr lnr-envelope"></span> <span class="text">support@colorlib.com</span></a> -->
						  			</div>
						  		</div>
				  			</div>
						</div>
			<div class="container main-menu">
				<div class="row align-items-center justify-content-between d-flex">
					<div id="logo" >
						<a href="{{route('welcome')}}">
							<h3 style="color: #fff">รร.บ้านทุ่งกระเชาะ</h3>
						</a>
					</div>
					<nav id="nav-menu-container">
						<ul class="nav-menu">
							<li><a href="{{route('welcome')}}">
								<span class="{{ Route::currentRouteName() == 'welcome' ? 'fa fa-thumb-tack' : '' }}" aria-hidden="true"></span>  หน้าแรก</a>
							</li>
							<li><a href="{{route('history')}}">
								<span class="{{ Route::currentRouteName() == 'history' ? 'fa fa-thumb-tack' : '' }}" aria-hidden="true"></span>  ข้อมูลโรงเรียน</a>
							</li>
							<li class="menu-has-children"><a href="#">
								<span class="{{ (Route::currentRouteName() == 'blog.show') ||
								 (Route::currentRouteName() == 'blog.category') || (Route::currentRouteName() == 'blog.tag') ||
								  (Route::currentRouteName() == 'blog.search') ? 'fa fa-thumb-tack' : '' }}" aria-hidden="true"></span>  ข่าวสาร</a>
			            <ul>
										@if($category->count()>0)
											@foreach($category as $category)
						              <li><a href="{{route('blog.category',$category->id)}}">{{$category->name}}</a></li>
											@endforeach
										@else
												<li><a>ยังไม่ได้เพิ่มหัวข้อบทความ</a></li>
										@endif
			            </ul>
			         </li>
							<li><a href="{{route('listalbum')}}">
								<span class="{{ Route::currentRouteName() == 'listalbum' ? 'fa fa-thumb-tack' : '' }}" aria-hidden="true"></span>  อัลบั้มรูปภาพ</a>
							</li>
							<li><a href="{{route('contact')}}">
								<span class="{{ Route::currentRouteName() == 'contact' ? 'fa fa-thumb-tack' : '' }}" aria-hidden="true"></span> ติดต่อ</a>
							</li>
							@guest
								<li><a href="{{route('login')}}">เข้าสู่ระบบ</a></li>
							@else
							<li class="menu-has-children"><a href="#">{{ Auth::user()->titlename }}{{ Auth::user()->firstname}}&nbsp;{{ Auth::user()->lastname}}</a>
			            <ul>
										@if(auth()->user()->isS())
										<li>
											<a href="{{route('profile' , Auth::user()->id )}}">ข้อมูลเกรดและน้ำหนักส่วนสูง</a>
										</li>
										@else
										<li>
											<li><a href="{{route('student.index')}}">จัดการเว็บไซต์</a></li>
										</li>
										@endif
			              <li>
											<a class="dropdown-item" href="{{ route('logout') }}"
												 onclick="event.preventDefault();
																			 document.getElementById('logout-form').submit();">
													 {{ __('ออกจากระบบ') }}
											</a>

											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
													@csrf
											</form>
										</li>
			            </ul>
			         </li>
							@endguest
						</ul>
					</nav><!-- #nav-menu-container -->
				</div>
			</div>
		</header><!-- #header -->

		<section class="banner-area relative" id="home">
			<div class="overlay overlay-bg"></div>
			<div class="container">
				<div class="row d-flex align-items-center justify-content-center">
					<div class="about-content col-lg-12">
					<img src="{{asset('img/logo-removebg-preview.png')}}" width="350"  height="350" alt="" title="" />
					</div>
				</div>
			</div>
		</section>

@yield('content')

		<!-- start footer Area -->
		<!-- start footer Area -->
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">

						<div class="col-lg-4  col-md-6 col-sm-6">
							<div class="single-footer-widget">

							</div>
						</div>
					</div>
					<div class="footer-bottom row align-items-center justify-content-between">
						<p class="footer-text m-0 col-lg-6 col-md-12">
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							Create from Study &copy;2020 - all rights reserved.</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						</p>
						<div class="col-lg-6 col-sm-12 footer-social">

						</div>
					</div>
				</div>
			</footer>
		<!-- End footer Area -->


		<script src="{{asset('js/vendor/jquery-2.2.4.min.js')}}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
		<script src="{{asset('js/vendor/bootstrap.min.js')}}"></script>
		<script src="{{asset('js/easing.min.js')}}"></script>
		<script src="{{asset('js/hoverIntent.js')}}"></script>
		<script src="{{asset('js/superfish.min.js')}}"></script>
		<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
		<script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
		<script src="{{asset('js/jquery.tabs.min.js')}}"></script>
		<script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
		<script src="{{asset('js/owl.carousel.min.js')}}"></script>  <!-- bug navbar 101 125 147 ค่าเดิม loop: true -->
		<script src="{{asset('js/mail-script.js')}}"></script>
		<script src="{{asset('js/main.js')}}"></script>
		@yield('js')
	</body>
	@yield('script')
	</html>
