@extends("admin_base")
@section("title") Size Guides | Shirt & Art @endsection
@section("style")
<style>

</style>
@endsection
@section("content")
<div class="row">
<div class="col-12">
<h5 class="text-dark border-bottom">Sub-Categories</h5>
</div>
<div class="col-12 d-flex justify-content-end mb-3">
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#add_size_guides_modal"><i class="fas fa-plus"></i> Add New Size Guides</button>
</div>
<div class="col-12">
<div class="card card-body">
<table id="size_guides_table" class="table table-bordered table-striped text-center">
<thead>
    <tr>
        <th>#</th>
        <th>size_guides</th>
        <th>Sub-size_guides</th>
        <th>Total Products</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>
@foreach ($sub_categories as $size_guides)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $size_guides->size_guides->title }}</td>
    <td>{{ $size_guides->title }}</td>
    <td>{{ $size_guides->products->count() }}</td>
    <td>
        <button type="button" class="btn btn-warning btn-sm edit_size_guides_modal_btn" data-toggle="modal" data-target="#edit_size_guides_modal" data-id="{{ $size_guides->id }}" data-cat_id="{{ $size_guides->size_guides_id  }}" data-title="{{ $size_guides->title }}"><i class="fas fa-edit"></i> Edit</button>
        <form action="{{ route('admin_size_guides_delete') }}" method="POST" class="d-inline">
            @csrf
            <input type="hidden" name="id" value="{{ $size_guides->id }}">
            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
        </form>
    </td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>

<!-- add size_guides modal -->
<div class="modal fade" id="add_size_guides_modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark"><i class="fas fa-th-list"></i> Add Sub-size_guides</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('admin_size_guides_add') }}" method="POST">
      <div class="modal-body bg-light">
        @csrf
        <label for="categories" class="mb-1">Select size_guides</label>
        <select name="size_guides_id" id="categories" class="custom-select mb-3">
          <option selected disabled>Select one</option>
          @foreach ($categories as $size_guides)
            <option value="{{ $size_guides->id }}">{{ $size_guides->title }}</option>
          @endforeach
        </select>
        <label for="title" class="mb-1">Give a name for new Sub-size_guides</label>
        <input type="text" name="title" class="form-control" id="title" required>
      </div>
      <div class="modal-footer d-flex justify-content-between p-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- edit size_guides modal -->
<div class="modal fade" id="edit_size_guides_modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-dark"><i class="fas fa-border-all"></i> Edit Size Guides</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('admin_size_guides_edit') }}" method="POST">
      <div class="modal-body bg-light">
        @csrf
        <label for="categories" class="mb-1">Select size_guides</label>
        <select name="size_guides_id" id="categories" class="custom-select mb-3">
          @foreach ($categories as $size_guides)
            <option value="{{ $size_guides->id }}">{{ $size_guides->title }}</option>
          @endforeach
        </select>
        <label for="edit_size_guides_title" class="mb-1">Update sub-size_guides name</label>
        <input type="text" name="title" class="form-control" id="edit_size_guides_title" required>
        <input type="hidden" name="id" id="edit_size_guides_id">
      </div>
      <div class="modal-footer d-flex justify-content-between p-0">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-success">Save Changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section("script")
<script>
$(document).ready(function(){
  $("#size_guides_table").DataTable();
  $('#editor_size_guides').summernote();
  $(".edit_size_guides_modal_btn").click(function(){
        let size_guides_id = $(this).data("id");
        let size_guides = $(this).data("guide_content");
        let sub_cat_id = $(this).data("sub_cat_id");
        $("#edit_size_guides_title").val(size_guides);
        $("#edit_size_guides_id").val(size_guides_id);
        $("#categories option").each(function() {
            if ($(this).val() == size_guides_id) {
                $(this).prop("selected", true);
            }
        });
  });
});
</script>
@endsection