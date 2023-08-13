@extends('User.Layouts.AuthLayout')
@section('title', 'Login')
@section('content')
<div class="auth-full-page-content p-md-5 p-4">
    <div class="w-100">

        <div class="d-flex flex-column h-100">
            <div class="mb-4 mb-md-5">
                <a href="{{ URL::to('/') }}" class="d-block auth-logo">
                    <img src="{{ asset('logo/logo.png') }}" alt="" height="50" class="auth-logo-dark">
                    <img src="{{ asset('logo/logo.png') }}" alt="" height="50" class="auth-logo-light">
                </a>
            </div>
            <div class="my-auto">
                
                <div>
                    <h5 class="text-danger">Reset Password</h5>
                    <p class="text-muted">Set a new password for your account</p>
                </div>
                @if(Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="mt-4">
                    <form class="needs-validation" method="POST" action="{{ URL::to('/user/reset-password') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter Password">
                            @error('password')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password">
                            @error('password_confirmation')
                            <div class="invalid-feedback" style="display: block;">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mt-4 d-grid">
                            <button class="btn btn-danger waves-effect waves-light" type="submit">Reset Password</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-4 mt-md-5 text-center">
                <p class="mb-0">© <script>document.write(new Date().getFullYear())</script> AlbaProtein.</p>
            </div>
        </div>
        
        
    </div>
</div>
@endsection