@extends("general_base")
@section("title") My Dashboard @endsection
@section("style")
<style>
div.navbar_offer_area{
    display: none;
}
</style>
@endsection
@section("dashboard_nav")
<div class="header-bottom">
<div class="container text-center">
@if(auth()->check() && auth()->user()->is_admin)
<a href="{{ route('admin_dashboard') }}" class="me-3"><i class="fa-solid fa-user-shield"></i></a>
@endif
<a href="{{ route('dashboard') }}" class="text-danger">Dashboard</a>
<a href="{{ route('user_account') }}" class="mx-3 mx-md-5">Account</a>
<a href="{{ route('user_shipping_address') }}">Shpping Address</a>
<a href="{{ route('user_order_history') }}" class="mx-3 mx-md-5">Order History</a>
<a href="{{ route('logout') }}">Logout</a>
</div>
</div>
@endsection
@section("content")

@endsection
@section("script")

@endsection