@extends("general_base")
@section("title")
Verify Your Email
@endsection
@section("style")
@endsection
@section("content")
<div class="row w-100">
<div class="col-lg-6 mx-auto py-5">
<div class="login-form-area">
<div class="login-form">
<form action="{{ route('verification.send') }}" method="POST">
@csrf
<input type="hidden" name="token" value="{{ $request->route('token') }}">
<div class="login-heading">
@if (session('status') == 'verification-link-sent')
    <div class="alert alert-primary fade show" role="alert">A new verification link has been sent to the email address you provided during registration.</div>
@endif
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
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
</div>
<div>Thanks for signing up 🎉 <br>Before getting started, could you verify your email address by clicking on the link we just emailed to you?<br>If you didn't receive the email, we will gladly send you another.</div>
<div class="login-footer d-flex justify-content-center">
<button type="submit" class="submit-btn3 bg-primary">Resend Verification Email</button>
</div>
</form>
</div>
</div>
</div>
</div>
@endsection
@section("script")
@endsection