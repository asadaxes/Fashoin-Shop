@extends("general_base")
@section("title")
Best Quality Retailer
@endsection
@section("style")
@endsection
@section("content")
<section class="slider-area">
<div class="slider-active">

<div class="single-slider slider-bg1 slider-height d-flex align-items-center">
<div class="container">
<div class="rowr">
<div class="col-xxl-5 col-xl-6 col-lg-7 col-md-8  col-sm-10">
<div class="hero-caption text-center">
<span>Fashion Sale</span>
<h1 data-animation="bounceIn" data-delay="0.2s">Luxury Menz Style</h1>
<p data-animation="fadeInUp" data-delay="0.4s">Consectetur adipisicing elit. Laborum fuga incidunt laboriosam voluptas iure, delectus dignissimos facilis neque nulla earum.</p>
<a href="#" class="btn_1 hero-btn" data-animation="fadeInUp" data-delay="0.7s">Shop Now</a>
</div>
</div>
</div>
</div>
</div>

<div class="single-slider slider-bg2 slider-height d-flex align-items-center">
<div class="container">
<div class="row justify-content-end">
<div class="col-xxl-5 col-xl-6 col-lg-7 col-md-8 col-sm-10">
<div class="hero-caption text-center">
<span>Fashion Sale</span>
<h1 data-animation="bounceIn" data-delay="0.2s">Denim Girlz Style</h1>
<p data-animation="fadeInUp" data-delay="0.4s">Consectetur adipisicing elit. Laborum fuga incidunt laboriosam voluptas iure, delectus dignissimos facilis neque nulla earum.</p>
<a href="#" class="btn_1 hero-btn" data-animation="fadeInUp" data-delay="0.7s">Shop Now</a>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<section class="items-product1 pt-30">
<div class="container">
<div class="row">
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
<div class="single-items mb-20">
<div class="items-img">
<img src="assets/img/gallery/items1.jpg" alt>
</div>
<div class="items-details">
<h4><a href="{{ route('home') }}">Men's Fashion</a></h4>
<a href="{{ route('home') }}" class="browse-btn">Shop Now</a>
</div>
</div>
</div>
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
<div class="single-items mb-20">
<div class="items-img">
<img src="assets/img/gallery/items2.jpg" alt>
</div>
<div class="items-details">
<h4><a href="{{ route('home') }}">Women's Fashion</a></h4>
<a href="{{ route('home') }}" class="browse-btn">Shop Now</a>
</div>
</div>
</div>
<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
<div class="single-items mb-20">
<div class="items-img">
<img src="assets/img/gallery/items3.jpg" alt>
</div>
<div class="items-details">
<h4><a href="{{ route('home') }}">Baby Fashion</a></h4>
<a href="{{ route('home') }}" class="browse-btn">Shop Now</a>
</div>
</div>
</div>
</div>
</div>
</section>

<div class="latest-items section-padding fix">
<div class="container">
<div class="row justify-content-between">
<div class="col-xl-12">
<div class="nav-button">

<nav>
<div class="nav-tittle">
<h2>Our Latest Collection</h2>
</div>
<div class="nav nav-tabs" id="nav-tab" role="tablist">
<a class="nav-link active" id="nav-one-tab" data-bs-toggle="tab" href="#nav-one" role="tab" aria-controls="nav-one" aria-selected="true">Men</a>
<a class="nav-link" id="nav-two-tab" data-bs-toggle="tab" href="#nav-two" role="tab" aria-controls="nav-two" aria-selected="false">Women</a>
<a class="nav-link" id="nav-three-tab" data-bs-toggle="tab" href="#nav-three" role="tab" aria-controls="nav-three" aria-selected="false">Baby</a>
<a class="nav-link" id="nav-four-tab" data-bs-toggle="tab" href="#nav-four" role="tab" aria-controls="nav-four" aria-selected="false">Fashion</a>
</div>
</nav>

</div>
</div>
</div>
</div>
<div class="container">

<div class="tab-content" id="nav-tabContent">
<div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">

<div class="latest-items-active">

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest1.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest2.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest3.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest4.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest2.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest4.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">

<div class="latest-items-active">

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest1.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest2.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest3.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest4.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest2.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest4.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab">

<div class="latest-items-active">

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest1.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest2.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest3.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest4.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest2.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest4.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="tab-pane fade" id="nav-four" role="tabpanel" aria-labelledby="nav-four-tab">

<div class="latest-items-active">

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest1.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest2.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest3.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest4.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest2.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest4.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<section class="latest-items section-padding fix">
<div class="row">
<div class="col-xl-12">
<div class="section-tittle text-center mb-40">
<h2>You May Like</h2>
</div>
</div>
</div>
<div class="container">
<div class="latest-items-active">

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest5.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest6.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest7.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest8.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest6.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>

<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/latest7.jpg" alt></a>
<div class="socal_icon">
<a href="#"><i class="ti-shopping-cart"></i></a>
<a href="#"><i class="ti-heart"></i></a>
<a href="#"><i class="ti-zoom-in"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('home') }}">Cashmere Tank + Bag</a></h3>
<div class="properties-footer">
<div class="price">
<span>$98.00 <span>$120.00</span></span>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section>

<div class="categories-area">
<div class="container">
<div class="row">
<div class="col-lg-3 col-md-6 col-sm-6">
<div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".2s">
<div class="cat-icon">
<img src="assets/img/icon/services1.svg" alt>
</div>
<div class="cat-cap">
<h5>Fast & Free Delivery</h5>
<p>Free delivery on all orders</p>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
<div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".2s">
<div class="cat-icon">
<img src="assets/img/icon/services2.svg" alt>
</div>
<div class="cat-cap">
<h5>Secure Payment</h5>
<p>Free delivery on all orders</p>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
<div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".4s">
<div class="cat-icon">
<img src="assets/img/icon/services3.svg" alt>
</div>
<div class="cat-cap">
<h5>Money Back Guarantee</h5>
<p>Free delivery on all orders</p>
</div>
</div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
<div class="single-cat mb-50 wow fadeInUp text-center" data-wow-duration="1s" data-wow-delay=".5s">
<div class="cat-icon">
<img src="assets/img/icon/services4.svg" alt>
</div>
<div class="cat-cap">
<h5>Online Support</h5>
<p>Free delivery on all orders</p>
</div>
</div>
</div>
</div>
</div>
</div>

<section class="home-blog">
<div class="container">
<div class="row justify-content-center">
<div class="cl-xl-7 col-lg-8 col-md-10">
<div class="section-tittle text-center mb-40">
<h2>Latest News</h2>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-4 col-md-6 col-sm-6">
<div class="single-blogs mb-30">
<div class="blog-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/blog1.jpg" alt></a>
</div>
<div class="blogs-cap">
<span>Fashion Tips</span>
<h5><a href="{{ route('home') }}">What Curling Irons Are The Best Ones</a></h5>
<p>Consectetur adipisicing elit. Laborum fuga incidunt laboriosam voluptas iure, delectus..</p>
<a href="{{ route('home') }}" class="red-btn">Read More</a>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
<div class="single-blogs mb-30">
<div class="blog-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/blog2.jpg" alt></a>
</div>
<div class="blogs-cap">
<span>Fashion Tips</span>
<h5><a href="{{ route('home') }}">Vogue's Ultimate Guide To Autumn/
Winter 2019 Shoes</a></h5>
<p>Consectetur adipisicing elit. Laborum fuga incidunt laboriosam voluptas iure, delectus..</p>
<a href="{{ route('home') }}" class="red-btn">Read More</a>
</div>
</div>
</div>
<div class="col-lg-4 col-md-6 col-sm-6">
<div class="single-blogs mb-30">
<div class="blog-img">
<a href="{{ route('home') }}"><img src="assets/img/gallery/blog3.jpg" alt></a>
</div>
<div class="blogs-cap">
<span>Fashion Tips</span>
<h5><a href="{{ route('home') }}">What Curling Irons Are The Best Ones</a></h5>
<p>Consectetur adipisicing elit. Laborum fuga incidunt laboriosam voluptas iure, delectus..</p>
<a href="{{ route('home') }}" class="red-btn">Read More</a>
</div>
</div>
</div>
</div>
</div>
</section>
@endsection
@section("script")
@endsection