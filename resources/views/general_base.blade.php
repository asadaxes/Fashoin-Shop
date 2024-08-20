<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/icon/favicon.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/slicknav.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/price_rangs.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/fontawesome-all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <title>@yield('title') | Shirt & Art</title>
</head>
<style>
li.page-item a.page-link{
  color: #4a4a4a;
}
li.page-item.active span.page-link{
  background-color: #ff2020;
  border: #ff2020;
  color: #ffffff;
}
.cart::after {
  content: attr(data-cart-count);
}
.cart:not(.show-count)::after {
  content: none;
}
</style>
@yield('style')
<body>
<div id="preloader-active">
<div class="preloader d-flex align-items-center justify-content-center">
<div class="preloader-inner position-relative">
<div class="preloader-circle"></div>
<div class="preloader-img pere-text">
<h1 class="text-danger">S<small class="text-dark">&</small>A</h1>
</div>
</div>
</div>
</div>

<header>
<div class="header-area">
<div class="header-top d-none d-sm-block">
<div class="container">
<div class="row">
<div class="col-xl-12">
<div class="d-flex justify-content-between flex-wrap align-items-center">
<div class="header-info-left">
<ul>
<li><a href="#">About Us</a></li>
<li><a href="#">Privacy</a></li>
<li><a href="#">FAQ</a></li>
<li><a href="#">Careers</a></li>
</ul>
</div>
<div class="header-info-right d-flex">
<ul class="order-list">
<li><a href="#">My Wishlist</a></li>
</ul>
<ul class="header-social">
<li><a href="#"><i class="fab fa-facebook"></i></a></li>
<li> <a href="#"><i class="fab fa-instagram"></i></a></li>
<li><a href="#"><i class="fab fa-twitter"></i></a></li>
<li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
<li> <a href="#"><i class="fab fa-youtube"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="header-mid header-sticky">
<div class="container">
<div class="menu-wrapper">

<div class="logo mb-2 mb-lg-0">
<a href="{{ route('home') }}" class="text-danger"><h1 class="mb-1">Shirt & Art</h1></a>
</div>

<div class="main-menu d-none d-lg-block">
<nav>
<ul id="navigation">
<li><a href="{{ route('home') }}">Home</a></li>
@if($categories)
    @foreach($categories as $category)
        <li><a href="javascript:void(0)">{{ $category->title }} <i class="fas fa-angle-down"></i></a>
            <ul class="submenu">
                @if($category->subCategories->isNotEmpty())
                    @foreach($category->subCategories as $subCategory)
                        <li><a href="{{ route('category_view', strtolower($subCategory->title)) }}">{{ $subCategory->title }}</a></li>
                    @endforeach
                @else
                    <li><a href="javascript:void(0)">No Sub-categories</a></li>
                @endif
            </ul>
        </li>
    @endforeach
@endif
</ul>
</nav>
</div>
<div class="header-right">
<ul>
<li>
<div class="nav-search search-switch hearer_icon">
<a id="search_1" href="javascript:void(0)">
<span class="flaticon-search"></span>
</a>
</div>
</li>

<li class="cart"><a href="{{ route('cart') }}"><span class="flaticon-shopping-cart"></span></a></li>
@if(auth()->check())
<li><a href="{{ route('dashboard') }}"><span id="nav_account_btn" class="pe-2">My Dashboard</span><img src="{{ Storage::url( auth()->user()->avatar ) }}" id="nav_account_img"></a></li>
@else
<li><a href="{{ route('login') }}"><span class="flaticon-user"><span id="nav_account_btn">SIGN IN</span></span></a></li>
@endif

</ul>
</div>
</div>

<div class="search_input" id="search_input_box">
<form class="search-inner d-flex justify-content-between ">
<input type="text" class="form-control" id="search_input" placeholder="Search Here">
<button type="submit" class="btn"></button>
<span class="ti-close" id="close_search" title="Close Search"></span>
</form>
</div>

<div class="col-12">
<div class="mobile_menu d-block d-lg-none"></div>
</div>
</div>
</div>
<div class="header-bottom text-center navbar_offer_area">
<p>Sale Up To 50% Biggest Discounts. Hurry! Limited Perriod Offer <a href="#" class="browse-btn">Shop Now</a></p>
</div>
@yield("dashboard_nav")
</div>
</header>
<main>
<div id="cart_toast_container" class="position-fixed bottom-0 end-0 p-3" style="display: none; z-index: 1000;">
<div id="cart_toast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header text-white bg-success">
    <strong class="me-auto"><i class="fa-solid fa-cart-shopping"></i> Your Cart</strong>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body"></div>
</div>
</div>
@if(session("success"))
<div class="toast-container position-fixed bottom-0 end-0 p-3">
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header text-white bg-success">
    <strong class="me-auto">Successfull</strong>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    {{ session("success") }}
  </div>
</div>
</div>
@endif
@if($errors->any())
<div class="toast-container position-fixed bottom-0 end-0 p-3">
<div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header text-white bg-danger">
    <strong class="me-auto">There's an issue!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
</div>
</div>
@endif
@yield('content')
</main>
<footer>
<hr class="bg-dark mb-0">
<div class="footer-wrapper">
<div class="footer-area footer-padding">

<div class="container">
<div class="row justify-content-between">
<div class="col-xl-3 col-lg-3 col-md-6 col-sm-8">
<div class="single-footer-caption mb-50">
<div class="single-footer-caption mb-20">

<div class="footer-logo mb-35">
<a href="{{ route('home') }}" class="text-danger"><h1 class="mb-1">Shirt & Art</h1></a>
</div>
</div>
</div>
</div>
<div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
<div class="single-footer-caption mb-50">
<div class="footer-tittle">
<h4>Legal</h4>
<ul>
<li><a href="#">Privacy Policy</a></li>
<li><a href="#">Payment Policy</a></li>
<li><a href="#">Shipping Policy</a></li>
<li><a href="#">Terms Conditions</a></li>
</ul>
</div>
</div>
</div>
<div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
<div class="single-footer-caption mb-50">
<div class="footer-tittle">
<h4>Information</h4>
<ul>
<li><a href="#">Exchange & Return</a></li>
<li><a href="#">Size Guide</a></li>
<li><a href="#">Loyalty Program</a></li>
<li><a href="#">Display Centers</a></li>
</ul>
</div>
</div>
</div>
<div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
<div class="single-footer-caption mb-50">
<div class="footer-tittle">
<h4>Company</h4>
<ul>
<li><a href="#">About Us</a></li>
<li><a href="#">Contact Us</a></li>
<li><a href="#">Intellectual Property</a></li>
</ul>
</div>
</div>
</div>
<div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
<div class="single-footer-caption mb-50">
<div class="footer-tittle">
<h4>Service Center</h4>
<ul>
<li><a href="#"><i class="fas fa-phone"></i> +8801234567890</a></li>
<li style="width: max-content;"><a href="#"><i class="fas fa-envelope"></i> support@shirtandart.com</a></li>
<li><a href="#"><i class="fas fa-location-dot"></i> Shop no 1. Lorem ipsum dolor sit amet adipisicing elit.</a></li>
<li>
<div class="footer-social">
<a href="#"><i class="fab fa-facebook fa-lg"></i></a>
<a href="#"><i class="fab fa-instagram fa-lg"></i></a>
<a href="#"><i class="fab fa-youtube fa-lg"></i></a>
</div>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="row text-center mb-5 mb-sm-0">
<h6 class="font_marcellus">You can pay with</h6>
<div class="col-md-6 mx-auto">
<img src="{{ asset('assets/img/payments/american_express.jpg') }}" class="footer_payment_icons">
<img src="{{ asset('assets/img/payments/mastercard.jpg') }}" class="footer_payment_icons">
<img src="{{ asset('assets/img/payments/visa.jpg') }}" class="footer_payment_icons">
<img src="{{ asset('assets/img/payments/bkash.jpg') }}" class="footer_payment_icons">
<img src="{{ asset('assets/img/payments/nagad.jpg') }}" class="footer_payment_icons">
<img src="{{ asset('assets/img/payments/upay.png') }}" class="footer_payment_icons">
<img src="{{ asset('assets/img/payments/rocket.jpg') }}" class="footer_payment_icons">
</div>
</div>

</div>
</div>

<div class="footer-bottom-area">
<div class="footer-border">
<div class="row w-100">
<div class="col-xl-12">
<div class="footer-copy-right text-center">
<p>&copy; <script>document.write(new Date().getFullYear());</script> Shirt & Art. All rights reserved.</p>
</div>
</div>
</div>
</div>
</div>
</div>
</footer>

<div id="back-top">
<a class="wrapper" title="Go to Top" href="#">
<div class="arrows-container">
<div class="arrow arrow-one">
</div>
<div class="arrow arrow-two">
</div>
</div>
</a>
</div>

<script src="{{ asset('assets/js/modernizr-3.5.0.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.slicknav.min.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
<script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/js/price_rangs.js') }}"></script>
<script src="{{ asset('assets/js/contact.js') }}"></script>
<script src="{{ asset('assets/js/jquery.form.js') }}"></script>
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/js/mail-script.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
  let toastElement = document.querySelector('.toast');
  if (toastElement) {
    let toast = new bootstrap.Toast(toastElement);
    toast.show();
  }

  function updateCartCount() {
    let cart = localStorage.getItem('cart');
    cart = cart ? JSON.parse(cart) : [];
    let cartCount = cart.length;
    $('.cart').attr('data-cart-count', cartCount);
    if (cartCount > 0) {
      $('.cart').addClass('show-count');
    } else {
      $('.cart').removeClass('show-count');
    }
  }
  updateCartCount();
  
  $('.add_to_cart_btn').click(function() {
    let cart = localStorage.getItem('cart');
    cart = cart ? JSON.parse(cart) : [];
    let productData = $(this).data('product');
    let existingProductIndex = cart.findIndex(item => 
        item.variant.code === productData.variant.code && 
        item.variant.size === productData.variant.size
    );
    $("#cart_toast_container").show();
    if (existingProductIndex === -1) {
      cart.push(productData);
      localStorage.setItem('cart', JSON.stringify(cart));
      $('#cart_toast .toast-body').text('This product is added in your cart.');
      $('#cart_toast').toast('show');
    } else {
      $('#cart_toast .toast-body').text('This product is already in your cart!');
      $('#cart_toast').toast('show');
    }
    updateCartCount();
  });
});
</script>
@yield('script')
</body>
</html>