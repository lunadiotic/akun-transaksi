@extends('auth.layouts.app', ['title' => 'Login'])

@section('content')
<div class="account-pages mt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <div class="auth-logo">
                                <a href="#" class="logo logo-dark text-center">
                                    <span class="logo-lg">
                                        <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="22">
                                    </span>
                                </a>

                                <a href="#" class="logo logo-light text-center">
                                    <span class="logo-lg">
                                        <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="22">
                                    </span>
                                </a>
                            </div>
                            <p class="text-muted mb-4 mt-3">Enter your email address and password to access admin panel.</p>
                        </div>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group mb-3">
                                <label for="emailaddress">Email address</label>
                                <input
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email"
                                    type="email"
                                    id="emailaddress"
                                    required=""
                                    placeholder="Enter your email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <div class="input-group input-group-merge">
                                    <input
                                     type="password"
                                     id="password"
                                     name="password"
                                     class="form-control @error('password') is-invalid @enderror"
                                     placeholder="Enter your password">
                                    <div class="input-group-append" data-password="false">
                                        <div class="input-group-text">
                                            <span class="password-eye font-12"></span>
                                        </div>
                                    </div>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" class="custom-control-input" id="checkbox-signin" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                </div>
                            </div>

                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-primary btn-block" type="submit"> Log In </button>
                            </div>

                        </form>
                        <!-- form -->
                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                @if (Route::has('password.request'))
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p> <a href="{{ route('password.request') }}" class="text-white-50 ml-1">Forgot your password?</a></p>
                        </div> <!-- end col -->
                    </div>
                @endif
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->
@endsection
