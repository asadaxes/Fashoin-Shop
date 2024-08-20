@extends("admin_base")
@section("title") Products Inventory @endsection
@section("style")
<style>

</style>
@endsection
@section("content")
<div class="row">
<div class="col-12">
<h5 class="text-dark border-bottom">Products List</h5>
</div>
<div class="col-12 d-flex justify-content-end mb-3">
<a href="{{ route('admin_products_add') }}" class="btn btn-success"><i class="fas fa-plus"></i> Add New Product</a>
</div>
<div class="col-12 mb-3">
  <form method="GET">
    <div class="input-group">
        <input type="text" class="form-control py-4" name="search" id="search_field" placeholder="Search products by product title, code or price..." required>
        <div class="input-group-prepend">
            <button type="submit" class="input-group-text bg-light"><i class="fas fa-search"></i></button>
        </div>
    </div>
    <a href="{{ route('admin_products_list') }}" class="text-muted d-none" id="reset_btn"><small>reset</small></a>
</form>
</div>
<div class="col-12">
<table class="table table-bordered table-striped">
<thead class="bg-dark text-center">
    <tr>
        <th>#</th>
        <th>Product</th>
        <th>&#x9F3; Price</th>
        <th>Variants</th>
        <th>Details</th>
        <th>Category/Sub</th>
        <th>Published Date</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
@if(!empty($products))
@foreach($products as $product)
<tr>
    <td class="text-center">{{ $loop->iteration }}</td>
    <td>
      @php
        $variants = json_decode($product->variants, true);
        $thumbnail = $variants[0]['thumbnail'];
      @endphp
      <img src="{{ Storage::url($thumbnail) }}" width="80">
      <span>{{ $product->title }}</span>
    </td>
    <td class="text-center">
      <div class="d-flex flex-column">
        <span>Sale: {{ number_format($product->sale_price) }}</span>
        <span>Regular: {{ number_format($product->regular_price) }}</span>
      </div>
    </td>
    <td class="text-center">{{ count(json_decode($product->variants, true)) }}</td>
    <td>
      <div class="d-flex flex-column">
        <small>Description @if(empty($product->description)) <i class="fas fa-times text-danger"></i> @else <i class="fas fa-check text-success"></i> @endif </small>
        <small>Details @if(empty($product->details)) <i class="fas fa-times text-danger"></i> @else <i class="fas fa-check text-success"></i> @endif </small>
        <small>Care @if(empty($product->care)) <i class="fas fa-times text-danger"></i> @else <i class="fas fa-check text-success"></i> @endif </small>
        <small>Materials @if(empty($product->materials)) <i class="fas fa-times text-danger"></i> @else <i class="fas fa-check text-success"></i> @endif </small>
        <small>Measurement @if(empty($product->measurement)) <i class="fas fa-times text-danger"></i> @else <i class="fas fa-check text-success"></i> @endif </small>
      </div>
    </td>
    <td class="text-center">{{ $product->subCategory->category->title }}/{{ $product->subCategory->title }}</td>
    <td class="text-center">{{ \Carbon\Carbon::parse($product->created_at)->format('M d, Y') }}</td>
    <td class="text-center">
        <a href="{{ route('admin_products_edit', ['pid' => $product->id]) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
        <button type="button" class="btn btn-danger btn-sm delete_product_btn" data-toggle="modal" data-target="#delete_product_modal" data-id="{{ $product->id }}" data-img="{{ $thumbnail }}" data-title="{{ $product->title }}"><i class="fas fa-trash-alt"></i></button>
    </td>
</tr>    
@endforeach
@endif
</tbody>
</table>

<div class="modal fade" id="delete_product_modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger"><i class="fas fa-exclamation-triangle"></i> Delete This Product</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body bg-light">
        <h6 class="text-center mb-3">Are you sure? do you really want to delete this product?</h6>
        <div class="d-flex justify-content-around align-items-center">
          <div class="d-flex flex-column align-items-center">
            <img id="delete_modal_img" class="img-fluid mb-1" width="50">
            <span id="delete_modal_title"></span>
          </div>
          <i class="fa-solid fa-shuffle fa-lg text-dark"></i>
          <i class="fas fa-trash-can fa-3x text-danger"></i>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-between p-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <form action="{{ route('admin_products_delete') }}" method="POST">
            @csrf
            <input type="hidden" name="pid" id="product_id">
            <button type="submit" class="btn btn-danger">Confirm</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-12 d-flex justify-content-between align-items-baseline py-4">
<small class="text-dark">Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} results</small>
{{ $products->links("partial.pagination") }}
</div>
</div>
@endsection
@section("script")
<script>
$(document).ready(function(){
    $(".delete_product_btn").click(function(){
        $("#product_id").val($(this).data("id"));
        $("#delete_modal_img").attr("src", "/storage/"+$(this).data("img"));
        $("#delete_modal_title").text($(this).data("title"));
    });
});
function getSearchTermFromUrl() {
  let urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('search') || '';
}
window.onload = function() {
  document.getElementById('search_field').value = getSearchTermFromUrl();
  if(getSearchTermFromUrl()){
    document.getElementById('reset_btn').classList.remove('d-none');
  }
};
</script>
@endsection