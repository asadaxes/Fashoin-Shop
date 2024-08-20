@extends("general_base")
@section("title")
Set New Password
@endsection
@section("style")
@endsection
@section("content")
<div class="row w-100">
<div class="col-lg-6 mx-auto py-5">
<div class="login-form-area">
<div class="login-form">
<form action="{{ route('password.store') }}" method="POST">
@csrf
<input type="hidden" name="token" value="{{ $request->route('token') }}">
<div class="login-heading">
<span>Set New Password</span>
<p>Set a new password for your account. Choose a strong password that you can remember.</p>
</div>
@if($errors->any() || session('error'))
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
<div class="single-input-fields">
<label>Password</label>
<input type="password" name="password" placeholder="Enter Password" required>
</div>
<div class="single-input-fields">
<label>Password</label>
<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password" required>
</div>
</div>
<div class="login-footer d-flex justify-content-center">
<button type="submit" class="submit-btn3 bg-success">Update Password</button>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
@section("script")
@endsection