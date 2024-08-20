@extends("general_base")
@section("title") {{ $product->title }} - {{ $product->subCategory->title }} @endsection
@section("style")
<style>
div.features-img img.main_thumbnail{
    width: 312px;
    border-radius: 5px;
}
.variant_img_container{
    margin-top: 20px;
    padding: 8px 8px 0px 8px;
    background: #ffffff;
    border-radius: 5px;
    text-align: center;
    width: 312px;
    white-space: nowrap;
    overflow: auto;
    scrollbar-width: thin;
    scrollbar-color: #ff202085 transparent;
}
.variant_img_container::-webkit-scrollbar {
    width: 10px;
}

.variant_img_container::-webkit-scrollbar-track {
    background-color: transparent;
}

.variant_img_container::-webkit-scrollbar-thumb {
    background-color: #888888;
    border-radius: 5px;
}
.variant_img_container img{
    width: 80px !important;
    border: 1px solid #d3d3d3;
    padding: 2px;
    margin-bottom: 8px;
    border-radius: 5px;
    cursor: pointer;

}
.variant_img_container img.selected{
    border: 1px solid #ffa0a0 !important;
}
.product_btn_border{
    border: 1px solid #b5b5b5 !important;
}
.out_of_stock_size_btn{
    background: #e7e7e7;
    padding: 25px 36px;
    font-size: 14px;
    font-weight: 500;
    text-transform: capitalize;
    color: #222222;
    border-radius: 25px;
    cursor: default !important;
    display: inline-block;
    line-height: 0;
    -moz-user-select: none;
    position: relative;
    z-index: 1;
    border: 0;
    overflow: hidden;
}
.selected_size{
    background-color: #ff2020 !important;
    color: #ffffff;
}
</style>
@endsection
@section("content")
<div class="hero-area section-bg2">
<div class="container">
<div class="row w-100">
<div class="col-xl-12">
<div class="slider-area">
<div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
<div class="hero-caption hero-caption2">
<h2>{{ $product->title }}</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb justify-content-center">
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('category_view', strtolower($product->subCategory->title)) }}">{{ $product->subCategory->category->title }} - {{ $product->subCategory->title }}</a></li>
</ol>
</nav>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@php
$variants = json_decode($product->variants, true);   
@endphp
<div class="services-area2 pt-50">
<div class="container">
<div class="row">
<div class="col-xl-12">
<div class="row">
<div class="col-xl-12">

<div class="single-services d-flex justify-content-center align-items-center mb-0">
<div class="features-img">
<img src="{{ Storage::url($variants[0]['thumbnail']) }}" class="img-fluid main_thumbnail">
<div class="variant_img_container"></div>
</div>
<div class="features-caption">
<h3 class="mt-3 mt-sm-0">{{ $product->title }}</h3>
<p class="mb-2">Product Code: <span class="variant_product_code"></span></p>
<p class="mb-3">Color: <span class="variant_product_color"></span></p>
<div class="price d-flex">
<span>BDT {{ number_format($product->sale_price) }}</span>
@if(!empty($product->regular_price))
<small class="mx-2"><del class="text-muted">BDT {{ number_format($product->regular_price) }}</del></small>
<small class="text-danger">{{ number_format((($product->regular_price - $product->sale_price) / $product->regular_price) * 100, 2) }}% OFF</small>
@endif
</div>
<div class="d-flex flex-column mb-2">
<div class="d-flex justify-content-between mb-2">
<small class="fw-bold text-muted">Select Size</small>
<small class="text-muted">See Size Guides</small>
</div>
<div class="variant_sizes"></div>
</div>
<div class="border-bottom mb-3"></div>
<div class="text-center low_stock_warn_container pt-3 pb-2">
<small class="fw-bold text-danger low_stock_warn_msg d-none">Only 5 left</small>
</div>
<div class="text-center mt-3">
<button type="button" class="white-btn bg-dark text-white product_btn_border add_to_cart_btn mr-10" data-product="{{ $product->cart_data() }}"><i class="ti-shopping-cart"></i> Add to Cart</button>
<div class="text-center mt-4">
<a href="#" class="text-primary share-btn" data-network="facebook"><i class="fab fa-facebook"></i></a>
<a href="#" class="text-primary share-btn" data-network="messenger"><i class="fab fa-facebook-messenger"></i></a>
<a href="#" class="text-dark share-btn" data-network="twitter"><i class="fab fa-x-twitter"></i></a>
<a href="#" class="text-success share-btn" data-network="whatsapp"><i class="fab fa-whatsapp"></i></a>
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

<section class="our-client section-padding best-selling">
<div class="container">
<div class="row w-100">
<div class="offset-xl-1 col-xl-10">
<div class="nav-button f-left">

<nav>
<div class="nav nav-tabs " id="nav-tab" role="tablist">
@if(!empty($product->description))
<a class="nav-link active" id="nav-one-tab" data-bs-toggle="tab" href="#nav-one" role="tab" aria-controls="nav-one" aria-selected="true">Description</a>
@endif
@if(!empty($product->details))
<a class="nav-link" id="nav-two-tab" data-bs-toggle="tab" href="#nav-two" role="tab" aria-controls="nav-two" aria-selected="false">Details</a>
@endif
@if(!empty($product->materials))
<a class="nav-link" id="nav-three-tab" data-bs-toggle="tab" href="#nav-three" role="tab" aria-controls="nav-three" aria-selected="false">Materials</a>
@endif
@if(!empty($product->measurement))
<a class="nav-link" id="nav-four-tab" data-bs-toggle="tab" href="#nav-four" role="tab" aria-controls="nav-four" aria-selected="false">Measurement</a>
@endif
@if(!empty($product->care))
<a class="nav-link" id="nav-five-tab" data-bs-toggle="tab" href="#nav-five" role="tab" aria-controls="nav-five" aria-selected="false">Care</a>
@endif
</div>
</nav>

</div>
</div>
</div>
</div>
<div class="container">

<div class="tab-content" id="nav-tabContent">
@if(!empty($product->description))
<div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
<div class="row w-100">
<div class="offset-xl-1 col-lg-9">
{!! $product->description !!}
</div>
</div>
</div>
@endif
@if(!empty($product->details))
<div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
<div class="row w-100">
<div class="offset-xl-1 col-lg-9">
{!! $product->details !!}
</div>
</div>
</div>
@endif
@if(!empty($product->materials))
<div class="tab-pane fade" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab">
<div class="row w-100">
<div class="offset-xl-1 col-lg-9">
{!! $product->materials !!}
</div>
</div>
</div>
@endif
@if(!empty($product->measurement))
<div class="tab-pane fade" id="nav-four" role="tabpanel" aria-labelledby="nav-four-tab">
<div class="row w-100">
<div class="offset-xl-1 col-lg-9">
{!! $product->measurement !!}
</div>
</div>
</div>
@endif
@if(!empty($product->care))
<div class="tab-pane fade" id="nav-five" role="tabpanel" aria-labelledby="nav-five-tab">
<div class="row w-100">
<div class="offset-xl-1 col-lg-9">
{!! $product->care !!}
</div>
</div>
</div>
@endif
</div>
</div>
</section>
<hr class="m-0">
<section class="latest-items section-padding fix">
<div class="row w-100">
<div class="col-xl-12">
<div class="section-tittle text-center mb-40">
<h2>You May Also Like</h2>
</div>
</div>
</div>
<div class="container">
<div class="latest-items-active">
@foreach($relevant_products as $rproduct)
@php
$rvariants = json_decode($rproduct->variants, true);   
@endphp
<div class="properties">
<div class="properties-card">
<div class="properties-img">
<a href=""><img src="{{ Storage::url($rvariants[0]['thumbnail']) }}"></a>
<div class="socal_icon">
<a href="javascript:void(0)" class="add_to_cart_btn w-100" data-product="{{ $product->cart_data() }}"><i class="ti-shopping-cart"></i></a>
</div>
</div>
<div class="properties-caption properties-caption2">
<h3><a href="">{{ $rproduct->title }}</a></h3>
<div class="properties-footer">
<div class="price">
<span>BDT {{ number_format($rproduct->sale_price) }} <span>{!! empty($rproduct->regular_price) ? "" : "&#x9F3;".number_format($rproduct->regular_price) !!}</span></span>
</div>
</div>
</div>
</div>
</div>
@endforeach
</div>
</div>
</section>
@endsection
@section("script")
<script>
$(document).ready(function() {
    let variants = @json(json_decode($product->variants, true));

    function updateVariantDetails(variant) {
        let code = $(".variant_product_code");
        let color = $(".variant_product_color");
        let sizes = $(".variant_sizes");
        // Update the variant details
        code.html(variant.code);
        color.html(variant.color);
        
        // Update sizes
        sizes.html("");
        let sizeStockHtml = "";
        $.each(variant.size_stock, function(size, stock) {
            if (parseInt(stock) === 0) {
                sizeStockHtml += `<button class="out_of_stock_size_btn p-3 m-1" title="out of stock"><del>${size}</del></button>`;
            } else {
                sizeStockHtml += `<button class="white-btn product_btn_border size_selector_btn p-3 m-1" data-stock="${stock}" data-size="${size}" data-thumbnail="${variant.thumbnail}" data-color="${variant.color}" data-code="${variant.code}">${size}</button>`;
            }
        });
        sizes.append(sizeStockHtml);
        sizes.find('.size_selector_btn').on('click', function() {
            sizes.find('.size_selector_btn').removeClass('selected_size');
            $(this).addClass('selected_size');
            let stock = parseInt($(this).data('stock'));
            let size = $(this).data('size');
            let lowStockContainer = $(".low_stock_warn_container");
            let lowStockMsg = $(".low_stock_warn_msg");
            if (stock < 10) {
                lowStockContainer.removeClass('pt-3 pb-2');
                lowStockMsg.removeClass('d-none').text(`Only ${stock} left`);
            } else {
                lowStockContainer.addClass('pt-3 pb-2');
                lowStockMsg.addClass('d-none').text('');
            }
            let cart_data = $(".add_to_cart_btn").data("product");
            cart_data.variant = {
                code: $(this).data("code"),
                color: $(this).data("color"),
                thumbnail: $(this).data("thumbnail"),
                size: $(this).data("size"),
                stock: $(this).data("stock")
            };
        });
    }

    function updateVariants(){
        let thumbnails = $(".variant_img_container");
        let mainThumbnail = $(".main_thumbnail");

        $.each(variants, function(index, variant) {
            let imgSrc = "{{ Storage::url('') }}" + variant.thumbnail;
            let img = $("<img>")
                .attr("src", imgSrc)
                .on("click", function() {
                    mainThumbnail.attr("src", imgSrc);

                    thumbnails.find("img").removeClass("selected");
                    $(this).addClass("selected");

                    updateVariantDetails(variant);
                    $(".low_stock_warn_container").addClass('pt-3 pb-2');
                    $(".low_stock_warn_msg").addClass('d-none').text('');
                });
            thumbnails.append(img);

            if (index === 0) {
                img.addClass("selected");
                updateVariantDetails(variant);
            }
        });
    }

    updateVariants();


    function openShareDialog(network, url) {
        let shareURL = encodeURIComponent(url);
        switch (network) {
            case 'facebook':
                window.open('https://www.facebook.com/sharer/sharer.php?u=' + shareURL, 'Facebook Share', 'width=600,height=400');
                break;
            case 'messenger':
                window.open('fb-messenger://share/?link=' + shareURL, 'Facebook Messenger Share', 'width=600,height=400');
                break;
            case 'twitter':
                window.open('https://twitter.com/intent/tweet?url=' + shareURL, 'Twitter Share', 'width=600,height=400');
                break;
            case 'whatsapp':
                window.open('whatsapp://send?text=' + shareURL, 'WhatsApp Share', 'width=600,height=400');
                break;
            default:
                console.error('Invalid network');
        }
    }

    let shareBtns = document.querySelectorAll('.share-btn');
        shareBtns.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                let network = this.getAttribute('data-network');
                let url = window.location.href;
                openShareDialog(network, url);
        });
    });
});
</script>
@endsection