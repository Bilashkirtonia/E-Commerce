<!DOCTYPE html>
<html lang="en">
<head>
	<title>Popularsoft E-Commerce</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}fonts/linearicons-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}vendor/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}vendor/MagnificPopup/magnific-popup.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}vendor/perfect-scrollbar/perfect-scrollbar.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}css/util.css">
	<link rel="stylesheet" type="text/css" href="{{ asset('') }}css/main.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body class="animsition">
	
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						<font size="3px" color="#fff">
	                        {{ $contact->mobile }} &nbsp;&nbsp;&nbsp;
	                        {{ $contact->email }}
	                    </font>
					</div>

					<div class="right-top-bar flex-w h-full">
						<ul class="social">
	                        <li target="_blabk" class="facebook"><a href="{{ $contact->facebook }}"><i class="fa fa-facebook"></i></a></li>
	                        <li target="_blabk"  class="twitter"><a href="{{ $contact->twitter }}"><i class="fa fa-twitter"></i></a></li>
	                        <li target="_blabk"  class="google-plus"><a href="{{ $contact->google }}"><i class="fa fa-google-plus"></i></a></li>
	                        <li target="_blabk"  class="youtube"><a href="{{ $contact->youtube }}"><i class="fa fa-youtube-play"></i></a></li>
	                    </ul>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="{{ url('/') }}" class="logo">
						<img src="{{ url('upload/logo/',$logo->image )}}" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
	                    <ul class="main-menu">
	                        <li class="active-menu">
	                            <a href="{{ url('/') }}">HOME</a>
	                        </li>
	                        <li class="active-menu">
	                            <a href="#">SHOPS</a>
	                            <ul class="sub-menu">
	                                <li><a href="{{ route('product_list') }}">Products</a></li>
	                                <li><a href="">Checkout</a></li>
	                                <li><a href="shoping-cart.html">Cart</a></li>
	                            </ul>
	                        </li>
	                        <li>
	                            <a href="{{ route('about_us') }}">ABOUT US</a>
	                        </li>
	                        <li>
	                            <a href="{{ route('contact_us') }}">CONTACT US</a>
	                        </li>
							@if (@Auth::User()->id !=NULL)
							<li class="active-menu">
	                            <a href="#">Account</a>
	                            <ul class="sub-menu">
	                                <li><a href="{{ route('dashbord') }}">My dashbord</a></li>
	                                
									<li><a href="{{ route('change_password') }}">Password change</a></li>
	                                <li><a href="{{ route('my_order') }}">My order</a></li>
									<li>
										<a class="dropdown-item" href="{{ route('logout') }}"
										onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
										{{ __('Logout') }}
									  </a>
									   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
										 @csrf
									   </form>
									   
									</li>
	                            </ul>
	                        </li>
							@else
	                        <li><a href="{{ route('customer_login') }}">LOGIN</a></li>
							@endif

	                    </ul>
	                </div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="{{ Cart::count() }}">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="images/logo/logo.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						<font size="3px" color="#fff">
	                        {{ $contact->mobile }} &nbsp;&nbsp;&nbsp;
	                        {{ $contact->email }}
	                    </font>
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<ul class="social">
	                        <li target="_blabk" class="facebook"><a href="{{ $contact->facebook }}"><i class="fa fa-facebook"></i></a></li>
	                        <li target="_blabk"  class="twitter"><a href="{{ $contact->twitter }}"><i class="fa fa-twitter"></i></a></li>
	                        <li target="_blabk"  class="google-plus"><a href="{{ $contact->google }}"><i class="fa fa-google-plus"></i></a></li>
	                        <li target="_blabk"  class="youtube"><a href="{{ $contact->youtube }}"><i class="fa fa-youtube-play"></i></a></li>
						</ul>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li><a href="index.html">Home</a></li>
				<li>
					<a href="">SHOPS</a>
					<ul class="sub-menu-m">
						<li><a href="{{ route('product_list') }}">Products</a></li>
                        <li><a href="">Checkout</a></li>
                        <li><a href="shoping-cart.html">Cart</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>
				<li>
                    <a href="">ABOUT US</a>
                </li>
                <li>
                    <a href="contact.html">CONTACT US</a>
                </li>
                <li><a href="">LOGIN</a></li>
			</ul>
		</div>
	</header>