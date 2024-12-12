@extends('layouts.auth.default')
@section('content')
<div class="wrap-login100">
    <form class="login100-form validate-form" method="POST" action="{{ route('registerpost') }}">
        @csrf

        @if (session('message'))
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif

        <span class="login100-form-title p-b-26">
            Register
        </span>
        <span class="login100-form-title p-b-48"></span>

        <div class="wrap-input100">
            <input class="input100" type="text" name="email" value="{{ old('email') }}">
            <span class="focus-input100" data-placeholder="Email"></span>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="wrap-input100">
            <input class="input100" type="text" name="name" value="{{ old('name') }}">
            <span class="focus-input100" data-placeholder="Name"></span>
            @error('name')
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

        <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
                <div class="login100-form-bgbtn"></div>
                <button class="login100-form-btn" type="submit">
                    Register
                </button>
            </div>
        </div>

        <div class="text-center p-t-115">
            <span class="txt1">Do have an account?</span>
            <a class="txt2" href="{{ route('login') }}">Sign In</a>
        </div>
    </form>
</div>
@endsection
