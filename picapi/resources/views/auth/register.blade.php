@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="login-form">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
                <h4 class="modal-title">Create Account</h4>
                <div class="form-group">
                    <input id="name" placeholder="Username" type="text"
                        class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"
                        required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="email" name="email" placeholder="Email Id" type="text"
                        class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                        required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password" placeholder="Password" type="password"
                        class="form-control @error('password') is-invalid @enderror" name="password" required
                        autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control"
                        name="password_confirmation" required autocomplete="new-password">
                </div>
                <div class="form-group small clearfix">
                    <label class="form-check-label"><input type="checkbox" name="remember" id="remember"
                            {{ old('remember') ? 'checked' : '' }}> Remember me</label>
                    {{-- <a href="#" class="forgot-link">Forgot Password?</a> --}}
                    @if (Route::has('password.request'))
                        <a class="forgot-link" href="{{ route('login') }}">
                            {{ __('Already have an account?') }}
                        </a>
                    @endif
                </div>
                <div class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary btn-block btn-lg">
                        {{ __('Register') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
