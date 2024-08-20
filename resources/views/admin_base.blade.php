<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/icon/favicon.png') }}" />
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Figtree:400,500,600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/dataTables.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/responsiveTable.css') }}">
  @yield("stylesheet")
  <title>@yield("title") | Shirt & Art</title>
</head>
<style>
body{
  font-family: "Figtree", sans-serif;
}
aside.main-sidebar.sidebar-dark-primary{
  height: 100%;
  overflow: auto;
}
.logo_img{
  margin-left: 0.8rem;
  max-height: 40px;
  width: auto;
}
</style>
@yield("style")
<body class="hold-transition sidebar-mini">
<!-- body wrapper :start -->
<div class="wrapper">
<!-- navbar :start -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a href="javascript:void(0)" class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- navbar :end-->
  <!-- left sidebar :start -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin_dashboard') }}" class="brand-link py-2">
      <!-- <img src="{{ asset('assets/logo_dashboard.png') }}" class="logo_img"> -->
      Shirt & Art
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-2 d-flex">
        <div class="image">
          <img src="{{ Storage::url( auth()->user()->avatar ) }}" class="img-circle elevation-1">
        </div>
        <div class="info">
          <a href="{{ route('admin_users_view', ['uid' => auth()->user()->id]) }}" class="d-block">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</a>
        </div>
      </div>

      <nav>
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin_dashboard') }}" class="nav-link {{ isset($active_page) && $active_page == 'dashboard' ? 'active' : '' }}">
              <i class="nav-icon fas fa-chart-bar"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-header">Accounts Management</li>
          <li class="nav-item">
            <a href="{{ route('admin_users_list') }}" class="nav-link {{ isset($active_page) && $active_page == 'users' ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>Users</p>
            </a>
          </li>
          <li class="nav-header">Inventory</li>
          <li class="nav-item">
            <a href="{{ route('admin_category_list') }}" class="nav-link {{ isset($active_page) && $active_page == 'category' ? 'active' : 'category' }}">
              <i class="nav-icon fas fa-border-all"></i>
              <p>Category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin_sub_category_list') }}" class="nav-link {{ isset($active_page) && $active_page == 'sub_category' ? 'active' : '' }}">
              <i class="nav-icon fas fa-th-list"></i>
              <p>Sub-category</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin_products_list') }}" class="nav-link {{ isset($active_page) && $active_page == 'products' ? 'active' : '' }}">
              <i class="nav-icon fas fa-network-wired"></i>
              <p>Products</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin_size_guides_list') }}" class="nav-link {{ isset($active_page) && $active_page == 'size_guides' ? 'active' : '' }}">
              <i class="nav-icon fas fa-vest"></i>
              <p>Size Guides</p>
            </a>
          </li>
          <li class="nav-header">Site Preference</li>
          <li class="nav-item">
            <a href="" class="nav-link {{ isset($active_page) && $active_page == 'settings' ? 'active' : '' }}">
              <i class="nav-icon fas fa-cog"></i>
              <p>Settings</p>
            </a>
          </li>
          <li class="nav-item">
            <hr class="bg-white my-2">
          </li>
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-pager"></i>
              <p>Client Area</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link">
              <i class="nav-icon fa fa-share-square"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
<!-- left sidebar :end -->
<!-- content wrapper :start -->
<div class="content-wrapper">
<div class="content">
<div class="container-fluid pt-3">
@if(session('success'))
<div class="position-fixed px-3" style="z-index: 5; right: 0; top: 5;">
  <div class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
    <div class="toast-header bg-success">
      <strong class="mr-auto">perfect!</strong>
      <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="toast-body">
      {{ session('success') }}
    </div>
  </div>
</div>
@endif
@if (session('error'))
<div class="position-fixed px-3" style="z-index: 5; right: 0; top: 5;">
    <div class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
        <div class="toast-header bg-danger">
            <strong class="mr-auto">There's an issue!</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            {{ session('error') }}
        </div>
    </div>
</div>
@endif
@if ($errors->any() || session('errors'))
<div class="position-fixed px-3" style="z-index: 5; right: 0; top: 5;">
    <div class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-delay="10000">
        <div class="toast-header bg-danger">
            <strong class="mr-auto">There's an issue!</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="toast-body">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endif
@yield("content")
</div>
</div>
</div>
<!-- content wrapper :end -->
</div>
<!-- body wrapper :end -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap4.js') }}"></script>
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<script src="{{ asset('assets/js/JQdataTables.js') }}"></script>
<script src="{{ asset('assets/js/responsiveTable.js') }}"></script>
<script src="{{ asset('assets/js/dataTables.js') }}"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
  let toastElement = document.querySelector(".toast");
    if (toastElement) {
      let toast = new bootstrap.Toast(toastElement);
      toast.show();
    }
});
</script>
@yield("script")
</body>
</html>