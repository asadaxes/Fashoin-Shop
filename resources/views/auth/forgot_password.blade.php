@extends("general_base")
@section("title")
Forgot Password
@endsection
@section("style")
@endsection
@section("content")
<div class="row w-100">
<div class="col-lg-6 mx-auto py-5">
<div class="login-form-area">
<div class="login-form">
<form action="{{ route('password.email') }}" method="POST">
@csrf
<div class="login-heading">
<span>Forgot Your Password?</span>
<p>No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
</div>
@if(session('status'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('status') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif($errors->any() || session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        @if(session('error'))
            {{ session('error') }}
        @else
            <ul class="my-0 mx-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<div class="input-box pb-5">
<div class="single-input-fields">
<label>Email Address</label>
<input type="email" name="email" placeholder="Email address" required>
</div>
</div>
<div class="d-flex justify-content-end mb-2">
{!! NoCaptcha::renderJs() !!}
{!! NoCaptcha::display() !!}
</div>
<div class="login-footer">
<p><a href="{{ route('login') }}"><i class="fas fa-chevron-left"></i> Go back to Login</a></p>
<button type="submit" class="submit-btn3">Email Password Reset Link</button>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
@section("script")
@endsection