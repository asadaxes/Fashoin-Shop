@extends("general_base")
@section("title") Your Shopping Cart @endsection
@section("style")
<style>
img.card_thumbnail_preview{
    width: 80px;
}
span.quantity_btn_minus, span.quantity_btn_plus{
    cursor: pointer;
}
.quantity_field{
    width: 80px !important;
}
</style>
@endsection
@section("content")

<div class="hero-area section-bg2">
<div class="container">
<div class="row">
<div class="col-xl-12">
<div class="slider-area">
<div class="slider-height2 slider-bg4 d-flex align-items-center justify-content-center">
<div class="hero-caption hero-caption2">
<h2>Your Shopping Cart</h2>
<nav aria-label="breadcrumb">
<ol class="breadcrumb justify-content-center">
<li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
<li class="breadcrumb-item"><a href="{{ route('cart') }}">Cart</a></li>
</ol>
</nav>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<section class="cart_area">
<div class="container">
<div class="cart_inner">
<div class="table-responsive">
<table class="table">
<thead>
<tr>
<th scope="col">Product</th>
<th scope="col">Price</th>
<th scope="col">Quantity</th>
<th scope="col">Total</th>
<th scope="col"><i class="fas fa-minus-circle"></i></th>
</tr>
</thead>
<tbody id="cart_container">
</tbody>
</table>
<div class="d-flex justify-content-end align-items-center border-bottom mb-4 pb-2">
    <h6 class="me-4">Subtotal
        <br>
        <small class="text-muted">(Vat Included)</small>
    </h6>
    <h6 id="subtotal"></h6>
</div>

<div class="checkout_btn_inner d-flex justify-content-end">
<a class="btn me-2 py-3 px-2 d-flex align-items-center" href="{{ route('home') }}"><i class="fas fa-angle-left me-2 px-0"></i> Continue Shopping</a>
<a class="btn checkout_btn bg-dark py-3 px-2 d-flex align-items-center" href="#">Proceed to checkout <i class="fas fa-angle-right ms-2"></i></a>
</div>
</div>
</div>
</div>
</section>
@endsection
@section("script")
<script>
$(document).ready(function() {
    let cartContainer = $("#cart_container");
    let subtotalElement = $("#subtotal");

    // Retrieve products from local storage
    let products = JSON.parse(localStorage.getItem("cart"));

    // Check if there are products in the cart
    if (products && products.length > 0) {
        // Loop through each product
        products.forEach(function(product) {
            // Create the HTML structure for the product
            let trHtml = `
                <tr data-variant-code="${product.variant.code}">
                    <td>
                        <div class="media">
                            <div class="d-flex mb-2 mb-md-0">
                                <a href="/product/${product.slug}"><img src="/storage/${product.variant.thumbnail}" class="card_thumbnail_preview" /></a>
                            </div>
                            <div class="media-body d-flex flex-column">
                                <h5 class="text-dark">${product.title}</h5>
                                <small class="text-muted">Code: ${product.variant.code}</small>
                                <small class="text-muted">Color: ${product.variant.color}</small>
                                <small class="text-muted">Size: ${product.variant.size}</small>
                            </div>
                        </div>
                    </td>
                    <td>
                        <h5 class="sale_price">BDT ${product.sale_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</h5>
                    </td>
                    <td>
                        <div class="product_count">
                            <div class="input-group flex-nowrap">
                                <span class="input-group-text bg-white quantity_btn_minus"><i class="fas fa-ban fa-sm text-muted"></i></span>
                                <input type="tel" class="form-control quantity_field" value="1" min="1" max="${product.variant.stock}" required>
                                <span class="input-group-text bg-white quantity_btn_plus"><i class="fas fa-plus fa-sm text-muted"></i></span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <h5 class="total_cost">BDT ${product.sale_price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")}</h5>
                    </td>
                    <td>
                        <a href="javascript:void(0)"><i class="fas fa-trash-alt text-danger"></i></a>
                    </td>
                </tr>
            `;
            
            // Append the table row to the cart container
            cartContainer.append(trHtml);
        });
        calculateSubtotal();
    } else {
        // If cart is empty, display a message
        cartContainer.html("<p>Your cart is empty.</p>");
    }

    cartContainer.on("click", ".quantity_btn_minus, .quantity_btn_plus", function() {
        let quantityField = $(this).siblings(".quantity_field");
        let currentValue = parseInt(quantityField.val());
        let minQuantity = parseInt(quantityField.attr("min"));
        let maxQuantity = parseInt(quantityField.attr("max"));

        if ($(this).hasClass("quantity_btn_minus") && currentValue > minQuantity) {
            quantityField.val(currentValue - 1);
        } else if ($(this).hasClass("quantity_btn_plus") && currentValue < maxQuantity) {
            quantityField.val(currentValue + 1);
        }

        updateTotalCost(quantityField);

        calculateSubtotal();
        updateQuantityIcons(quantityField);
    });

    function updateTotalCost(quantityField) {
        let tr = quantityField.closest("tr");
        let quantity = parseInt(quantityField.val());
        let salePriceText = tr.find(".sale_price").text().replace(/[^\d.]/g, '');
        let salePrice = parseFloat(salePriceText);
        let totalCost = quantity * salePrice;
        tr.find(".total_cost").text("BDT " + totalCost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
        return totalCost;
    }

    function updateQuantityIcons(quantityField) {
        let tr = quantityField.closest("tr");
        let quantity = parseInt(quantityField.val());
        let minQuantity = parseInt(quantityField.attr("min"));
        let maxQuantity = parseInt(quantityField.attr("max"));

        if (quantity === minQuantity) {
            tr.find(".quantity_btn_minus i").addClass("fa-ban").removeClass("fa-minus");
        } else {
            tr.find(".quantity_btn_minus i").removeClass("fa-ban").addClass("fa-minus");
        }

        if (quantity === maxQuantity) {
            tr.find(".quantity_btn_plus i").addClass("fa-ban").removeClass("fa-plus");
        } else {
            tr.find(".quantity_btn_plus i").removeClass("fa-ban").addClass("fa-plus");
        }
    }

    function calculateSubtotal() {
        let subtotal = 0;

        cartContainer.find("tr").each(function() {
            let totalCost = updateTotalCost($(this).find(".quantity_field"));
            subtotal += totalCost;
        });

        subtotalElement.text("BDT " + subtotal.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","));
    }

    // Event delegation for trash icon click
    cartContainer.on("click", ".fa-trash-alt", function() {
        let tr = $(this).closest("tr");
        let variantCode = tr.data("variant-code");
        removeFromCart(variantCode);
        tr.remove();
        calculateSubtotal();
    });

    function removeFromCart(variantCode) {
        let cart = JSON.parse(localStorage.getItem("cart"));
        let updatedCart = cart.filter(product => product.variant.code !== variantCode);
        localStorage.setItem("cart", JSON.stringify(updatedCart));
    }
});
</script>
@endsection