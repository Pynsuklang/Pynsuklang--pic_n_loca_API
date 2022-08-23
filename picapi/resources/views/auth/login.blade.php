@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="login-form">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
                <h4 class="modal-title">Login to Your Account</h4>
                <div class="form-group">
                    <input id="email" type="text" placeholder="Registered Email Id"
                        class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                        required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password" placeholder="Password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group small clearfix">
                    <label class="form-check-label"><input type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}> Remember me</label>
                    {{-- <a href="#" class="forgot-link">Forgot Password?</a> --}}
                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
                </div>
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
            <div class="text-center small">Don't have an account? <a href="{{ route('register') }}">Sign up</a></div>
        </div>
    </div>
@endsection
