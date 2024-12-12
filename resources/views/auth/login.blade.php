@extends('layouts.auth.default')
@section('content')
<div class="wrap-login100">
    <form class="login100-form" action="{{ route('loginForm') }}" method="POST">
        @csrf

        @if (session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif

        <span class="login100-form-title p-b-26">Login</span>

        <div class="wrap-input100">
            <input class="input100" type="text" name="email" value="{{ old('email') }}">
            <span class="focus-input100" data-placeholder="Email"></span>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="wrap-input100">
            <span class="btn-show-pass">
                <i class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100" type="password" name="password">
            <span class="focus-input100" data-placeholder="Password"></span>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-check" style="margin-left: 3px;">
            <input type="checkbox" class="form-check-input" id="checkbox-signin" name="remember">
            <label class="form-check-label" for="checkbox-signin">Remember Me</label>
        </div>

        <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn" type="submit">
                    Login
                </button>
            </div>
        </div>

        <div class="text-center p-t-115">
            <span class="txt1">Don't have an account?</span>
            <a class="txt2" href="{{ route('register') }}">Sign Up</a>
        </div>
    </form>
</div>
@endsection
