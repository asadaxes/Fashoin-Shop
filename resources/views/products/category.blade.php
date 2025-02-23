@extends("general_base")
@section("title") {{ $sub_category->title }} for {{ $sub_category->category->title }} @endsection
@section("style")
@endsection
@section("content")
<div class="hero-area section-bg2">
<div class="container">
<div class="row w-100">
<div class="col-xl-12">
<div class="slider-area">
<div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
<div class="hero-caption hero-caption2">
<h2>{{ $sub_category->title }}</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb justify-content-center">
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="">Category - {{ $sub_category->title }}</a></li>
</ol>
</nav>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="listing-area pt-50 pb-50">
<div class="container">
<div class="row">

<div class="col-xl-3 col-lg-4 col-md-4">

<div class="category-listing mb-50">

<div class="single-listing">

<div class="select-Categories pb-30">
<div class="select-job-items2 mb-30">
<div class="col-xl-12">
<select name="select2">
<option value>Category</option>
<option value>Category 1</option>
<option value>Category 2</option>
<option value>Category 3</option>
<option value>Category 4</option>
</select>
</div>
</div>
<div class="select-job-items2 mb-30">
<div class="col-xl-12">
<select name="select2">
<option value>Size</option>
<option value>XXL</option>
<option value>XL</option>
<option value>LG</option>
<option value>M</option>
<option value>sm</option>
</select>
</div>
</div>
<div class="select-job-items2 mb-30">
<div class="col-xl-12">
<select name="select2">
<option value>Color</option>
<option value>Read</option>
<option value>Green</option>
<option value>Blue</option>
<option value>skyblue</option>
</select>
</div>
</div>
</div>


<aside class="left_widgets p_filter_widgets price_rangs_aside sidebar_box_shadow mb-40">
<div class="small-tittle">
<h4>Filter by Price</h4>
</div>
<div class="widgets_inner">
<div class="range_item">
<input type="text" class="js-range-slider" value />
<div class="d-flex align-items-center">
<div class="price_value d-flex justify-content-center">
<input type="text" class="js-input-from" id="amount" readonly />
<span>to</span>
<input type="text" class="js-input-to" id="amount" readonly />
</div>
</div>
</div>
</div>
</aside>


<div class="select-Categories pb-30">
<div class="small-tittle mb-20">
<h4>Filter by Genres</h4>
</div>
<label class="container">History
<input type="checkbox">
<span class="checkmark"></span>
</label>
<label class="container">Horror - Thriller
<input type="checkbox" checked="checked active">
<span class="checkmark"></span>
</label>
<label class="container">Love Stories
<input type="checkbox">
<span class="checkmark"></span>
</label>
<label class="container">Science Fiction
<input type="checkbox">
<span class="checkmark"></span>
</label>
<label class="container">Biography
<input type="checkbox">
<span class="checkmark"></span>
</label>
</div>


<div class="select-Categories pb-20">
<div class="small-tittle mb-20">
<h4>Filter by Brand</h4>
</div>
<label class="container">Green Publications
<input type="checkbox">
<span class="checkmark"></span>
</label>
<label class="container">Anondo Publications
<input type="checkbox" checked="checked active">
<span class="checkmark"></span>
</label>
<label class="container">Rinku Publications
<input type="checkbox">
<span class="checkmark"></span>
</label>
<label class="container">Sheba Publications
<input type="checkbox">
<span class="checkmark"></span>
</label>
<label class="container">Red Publications
<input type="checkbox">
<span class="checkmark"></span>
</label>
</div>

</div>
</div>

</div>

<div class="col-xl-9 col-lg-8 col-md-8">
<div class="latest-items latest-items2">
<div class="row">
@if($products->isEmpty())
<h6 class="text-center text-muted">no items found with this category!</h6>
@else
@foreach($products as $product)
@php
$variants = json_decode($product->variants, true);
@endphp
<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
<div class="properties pb-30">
<div class="properties-card">
<div class="properties-img">
<a href="{{ route('product_view', $product->slug) }}"><img src="{{ Storage::url($variants[0]['thumbnail']) }}"></a>
<div class="socal_icon">
<a href="{{ route('product_view', $product->slug) }}" class="w-100" data-product="{{ $product->cart_data() }}"><i class="ti-shopping-cart"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="{{ route('product_view', $product->slug) }}">{{ $product->title }}</a></h3>
<div class="properties-footer">
<small class="text-muted">Product Code: {{ $variants[0]['code'] }}</small>
<div class="price">
<span>BDT {{ number_format($product->sale_price) }} <span>{!! empty($product->regular_price) ? "" : "&#x9F3;".number_format($product->regular_price) !!}</span></span>
</div>
</div>
</div>
</div>
</div>
</div>
@endforeach
@endif
</div>
</div>
</div>
<div class="col-12 d-flex justify-content-between align-items-baseline py-4">
<small class="text-dark">Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} results</small>
{{ $products->links("partial.pagination") }}
</div>
</div>
</div>
</div>
@endsection
@section("script")
@endsection