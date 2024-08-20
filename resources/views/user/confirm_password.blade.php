@extends("dashboard_base")
@section("title") MicroGigX | Verify Yourself @endsection
@section("content")
<div class="card card-body">
<div class="row">
@if($errors->any() || session('error'))
<div class="col-md-4 mx-auto">
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
</div>
@endif
<div class="col-md-12 text-dark text-left text-center mb-2">
<h1 class="text-primary"><i class="fas fa-user-shield fa-2x"></i></h1>
<span class="text-dark">This is a secure area of the application. Please confirm your password before continuing.</span>
</div>
<div class="col-md-4 mx-auto text-center">
<form action="{{ route('password.confirm') }}" method="POST">
@csrf
<input type="password" name="password" class="form-control mb-2" placeholder="Enter your password" required>
<button type="submit" class="btn btn-success">Confirm</button>
</form>
</div>
</div>
</div>
@endsection