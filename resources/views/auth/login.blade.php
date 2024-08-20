@extends("general_base")
@section("title")
Login to continue
@endsection
@section("style")
@endsection
@section("content")
<div class="row w-100">
<div class="col-md-6 mx-auto py-5">
<div class="login-form-area">
<div class="login-form">
<form action="{{ route('login-post') }}" method="POST">
@csrf
<div class="login-heading">
<span>Login</span>
<p>Enter Login details to continue shopping</p>
</div>
<div class="input-box">
<div class="single-input-fields">
<label>Email Address</label>
<input type="email" name="email" placeholder="Email address" required>
</div>
<div class="single-input-fields">
<label>Password</label>
<input type="password" name="password" placeholder="Enter Password" required>
</div>
<div class="single-input-fields login-check">
<input type="checkbox" id="remember_me" name="remember_me">
<label for="remember_me">Keep me logged in</label>
<a href="{{ route('password.request') }}" class="f-right">Forgot Password?</a>
</div>
</div>
<div class="d-flex justify-content-end mb-2">
{!! NoCaptcha::renderJs() !!}
{!! NoCaptcha::display() !!}
</div>
<div class="login-footer">
<p>Don’t have an account? <a href="{{ route('register') }}">Sign Up</a> here</p>
<button type="submit" class="submit-btn3">Login</button>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
@section("script")
@endsection