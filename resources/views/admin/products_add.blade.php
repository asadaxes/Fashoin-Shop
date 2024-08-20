@extends("admin_base")
@section("title") Add New Product @endsection
@section("stylesheet") <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet"> @endsection
@section("style")
<style>
.remove_ss_btn{
    cursor: pointer;
}
.remove_pv_btn{
    cursor: pointer;
}
</style>
@endsection
@section("content")
<div class="mb-2">
<h5 class="text-dark border-bottom"><a href="{{ route('admin_products_list') }}" class="text-muted">Products List</a>/Add New Product</h5>
</div>
<form action="{{ route('admin_products_add_handler') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-md-6 mb-3 mb-md-0">
<div class="card card-body">
<h6 class="text-muted border-bottom pb-1 mb-3">Product Details</h6>
<div class="mb-3">
    <label for="title" class="text-dark mb-1">Product Title</label>
    <input type="text" name="title" class="form-control" id="title">
    <small class="text-muted" id="product_slug_preview"></small>
    <input type="hidden" name="slug" id="product_slug_field">
</div>
<div class="mb-3">
    <label for="editor_description" class="text-dark mb-1">Description</label>
    <textarea name="description" id="editor_description"></textarea>
</div>
<div class="mb-3">
    <label for="editor_details" class="text-dark mb-1">Details</label>
    <textarea name="details" id="editor_details"></textarea>
</div>
<div class="mb-3">
    <label for="editor_materials" class="text-dark mb-1">Materials</label>
    <textarea name="materials" id="editor_materials"></textarea>
</div>
<div class="mb-3">
    <label for="editor_measurement" class="text-dark mb-1">Measurement</label>
    <textarea name="measurement" id="editor_measurement"></textarea>
</div>
<div>
    <label for="editor_care" class="text-dark mb-1">Care</label>
    <textarea name="care" id="editor_care"></textarea>
</div>
</div>
</div>
<div class="col-md-6">
<div class="card card-body mb-3">
<h6 class="text-muted border-bottom pb-1 mb-3">Subcategory & Price</h6>
<div class="row">
<div class="col-12 mb-3">
<label for="sub_category" class="mb-1">Select a Sub-Category</label>
<select name="sub_category" id="sub_category" class="custom-select">
    <option selected disabled>Select one</option>
    @foreach($sub_categories as $scat)
    <option value="{{ $scat->id }}" data-category="{{ $scat->category->title }}">{{ $scat->title }}</option>
    @endforeach
</select>
<small id="category_name"></small>
</div>
<div class="col-md-6 mb-3 mb-md-0">
    <label for="sale_price" class="text-dark mb-1">Sale Price</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">BDT</span>
        </div>
        <input type="number" name="sale_price" id="sale_price" class="form-control" required>
    </div>
</div>
<div class="col-md-6">
    <label for="regular_price" class="text-dark mb-1">Regular Price</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">BDT</span>
        </div>
        <input type="number" name="regular_price" id="regular_price" class="form-control" placeholder="optional">
    </div>
</div>
</div>
<input type="hidden" name="variants" id="variant_store_field">
</div>
<div class="card card-body">
<h6 class="text-muted border-bottom pb-1 mb-3">Add/Remove Variants</h6>
<div class="row">
<div class="col-md-6 mb-3">
    <label for="variant_color" class="mb-1">Color</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa-solid fa-palette"></i></span>
        </div>
        <input type="text" id="variant_color" class="form-control" placeholder="eg: Black">
    </div>
</div>
<div class="col-md-6 mb-3">
    <label for="variant_pcode" class="mb-1">Product Code</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa-solid fa-hashtag"></i></span>
        </div>
        <input type="text" id="variant_pcode" class="form-control" placeholder="eg: 123456">
    </div>
</div>
<div class="col-md-6 mb-3">
    <label for="thumbnail" class="mb-1">Product Image</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa-solid fa-shirt"></i></span>
        </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="variant_thumbnail" accept=".png, .jpg, .jpeg">
          <label class="custom-file-label" for="variant_thumbnail">Choose file</label>
        </div>
    </div>
</div>
<div class="col-12">
<hr class="w-50 mx-auto my-2">
<div class="row">
<div class="col-5 col-md mb-3">
    <label for="variant_size" class="mb-1">Size</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa-solid fa-minimize"></i></span>
        </div>
        <input type="text" id="variant_size" class="form-control" placeholder="eg: XS/52">
    </div>
</div>
<div class="col-5 col-md mb-3">
    <label for="variant_stock" class="mb-1">Stock</label>
    <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fa-solid fa-warehouse"></i></span>
        </div>
        <input type="number" id="variant_stock" class="form-control" placeholder="0">
    </div>
</div>
<div class="col col-md-1 pt-4">
    <button type="button" class="btn btn-primary mt-1" id="variant_nest_add_btn"><i class="fas fa-plus"></i></button>
</div>
<div class="col-12 mt-2">
<div class="row">
<div class="col-md-5">
<table class="table table-sm text-center">
<thead>
    <tr>
        <th>Size</th>
        <th>Stock</th>
        <th><i class="fas fa-times"></i></th>
    </tr>
</thead>
<tbody id="variant_size_stock_table"></tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<div class="col-12 text-center">
    <button type="button" class="btn btn-outline-info" id="variant_add_btn"><i class="fa-solid fa-list-ol"></i> Add to product</button>
</div>
<div class="col-12">
<hr>
<ul class="list-group" id="variant_list_group">
</ul>
</div>
</div>
</div>
<div class="col-12 text-center mb-4 mb-md-0">
    <button type="submit" class="btn btn-outline-success btn-lg">Publish Now</button>
</div>
</div>
</div>
</form>
@endsection
@section("script")
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
$(document).ready(function() {
    let variants = [];
    let variant_format = {
        color: "",
        size_stock: {},
        thumbnail: "",
        code: ""
    };
    let table = $("#variant_size_stock_table");
    function updateSlug() {
        if (variants.length > 0) {
            let title = $('#title').val();
            let slug = slugify(title + '-' + variants[0].code);
            $('#product_slug_preview').html("product url will be: "+"<span class='text-info'>"+slug+"</span>");
            $('#product_slug_field').val(slug);
        }
    }
    $("#variant_nest_add_btn").click(function(){
        let size = $('#variant_size');
        let stock = $('#variant_stock');
        if (size.val().trim() !== "" || stock.val().trim() !== "") {
            variant_format.size_stock[size.val()] = stock.val();
            table.append(`<tr><td>${size.val()}</td><td>${stock.val()}</td><td><i class="fas fa-times text-danger remove_ss_btn"></i></td></tr>`);
            size.val('');
            stock.val('');
        }
    });

    table.on("click", ".remove_ss_btn", function() {
        let row = $(this).closest('tr');
        let size = row.find('td:first').text().trim();
        delete variant_format.size_stock[size];
        row.remove();
        updateSlug();
    });

    $("#variant_thumbnail").change(function() {
        let fileInput = this.files[0];
        let reader = new FileReader();
        reader.onload = function(e) {
            variant_format.thumbnail = e.target.result;
        };
        reader.readAsDataURL(fileInput);
        $(this).val('');
    });

    $("#variant_add_btn").click(function() {
        let color = $("#variant_color");
        let code = $("#variant_pcode");
        if (color.val().trim() !== "" && code.val().trim() !== "") {
            variant_format.color = color.val();
            variant_format.code = code.val();
            variants.push(variant_format);
            variant_format = {
                color: "",
                size_stock: {},
                thumbnail: "",
                code: ""
            };
            color.val('');
            code.val('');
            $("#variant_store_field").val(JSON.stringify(variants));
            table.empty();
            updateVariantList();
            updateSlug();
        }
    });

    function updateVariantList() {
        let listGroup = $("#variant_list_group");
        listGroup.empty();
        variants.forEach((variant, index) => {
            let listItem = $(`
                <li class="list-group-item p-2">
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <img src="${variant.thumbnail}" class="img-fluid mr-2" width="80px">
                            <div class="d-flex flex-column justify-content-center">
                                <span><span class="text-dark font-weight-bold">Color: </span><span>${variant.color}</span></span>
                                <span><span class="text-dark font-weight-bold">Code: </span><span>${variant.code}</span></span>
                            </div>
                        </div>
                        <div class="col-11 col-md-5 d-flex justify-content-center align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="d-flex flex-column">
                                    <small class="border text-center bg-light p-1">Size</small>
                                    <small class="border text-center bg-light p-1">Stock</small>
                                </div>
                                ${generateSizeStockRows(variant)}
                            </div>
                        </div>
                        <div class="col d-flex align-items-center">
                            <i class="fa-solid fa-circle-minus text-danger remove_pv_btn" data-index="${index}"></i>
                        </div>
                    </div>
                </li>
            `);
            listGroup.append(listItem);
        });
    }

    function generateSizeStockRows(variant) {
        let rows = '';
        for (const [size, stock] of Object.entries(variant.size_stock)) {
            rows += `
                <div class="d-flex flex-column">
                    <small class="border text-center p-1">${size}</small>
                    <small class="border text-center p-1">${stock}</small>
                </div>
            `;
        }
        return rows;
    }

    $(document).on('click', '.remove_pv_btn', function() {
        let index = $(this).data('index');
        variants.splice(index, 1);
        updateVariantList();
        $("#variant_store_field").val(JSON.stringify(variants));
        updateSlug();
    });


    $('#editor_description').summernote({
        height: 150
    });
    $('#editor_details').summernote({
        height: 150
    });
    $('#editor_materials').summernote({
        height: 150
    });
    $('#editor_measurement').summernote({
        height: 150
    });
    $('#editor_care').summernote({
        height: 150
    });

    $('#title').on('input', function() {
        let title = $(this).val();
        let slug = slugify(title);
        $('#product_slug_preview').html("product url will be: "+"<span class='text-info'>"+slug+"</span>");
        $('#product_slug_field').val(slug);
    });

    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')
            .replace(/[^\w-]+/g, '')
            .replace(/--+/g, '-')
            .replace(/^-+/, '')
            .replace(/-+$/, '');
    }

    $('#sub_category').change(function() {
        let categoryName = $(this).find(':selected').data('category');
        $('#category_name').html("parent category: "+"<span class='text-info'>"+categoryName+"</span>");
    });

});
</script>
@endsection