@extends("general_base")
@section("title")
Create an account
@endsection
@section("style")
@endsection
@section("content")
<div class="row w-100">
<div class="col-md-6 mx-auto py-5">
<div class="register-form-area">
<div class="register-form text-center">
<form action="{{ route('register-post') }}" method="POST">
@csrf
<div class="register-heading">
<span>Sign Up</span>
<p>Create your account to continue shopping</p>
</div>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif(session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{ session('info') }}
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
<div class="input-box">
<div class="single-input-fields">
<label>Full name</label>
<input type="text" name="full_name" placeholder="Enter full name" required>
</div>
<div class="single-input-fields">
<label>Email Address</label>
<input type="email" name="email" placeholder="Enter email address" required>
</div>
<div class="single-input-fields">
<label>Password</label>
<input type="password" name="password" placeholder="Enter Password" required>
</div>
<div class="single-input-fields">
<label>Confirm Password</label>
<input type="password" name="password_confirmation" placeholder="Confirm Password" required>
</div>
</div>
<div class="d-flex justify-content-end mb-2">
{!! NoCaptcha::renderJs() !!}
{!! NoCaptcha::display() !!}
</div>
<div class="register-footer">
<p>Already have an account? <a href="{{ route('login') }}"> Login</a> here</p>
<button type="submit" class="submit-btn3">Sign Up</button>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
@section("script")
@endsection