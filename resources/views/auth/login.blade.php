@extends('layouts.web')
@section('content')

<style>
    a:hover {
        color: #0a58ca;
        text-decoration: underline;
    }
    .login a {
        color: #3f3f3f;
        text-decoration: none;
    }
    .login:hover a {
        color: white;
    }
</style>

<div class="container">
    <div class="row">
        <div class="h-100 d-flex align-items-center justify-content-center mt-5 mb-login">
            <div class="login-area" style="width: 460px;">
                <h1>Log In</h1>
                <span>Get started by filling up details below</span>
                <div class="login-option">
                    <button type="button" class="login">
                        <img src="{{url('images/')}}/google.svg">
                        <a href="{{url('login/google')}}" class=""> Log in with Google </a>
                    </button>
                    <button type="button" class="login">
                        <img src="{{url('images/')}}/fb.svg">
                        <a href="{{url('login/facebook')}}" class=""> Log in with Facebook </a>
                    </button>
                </div>
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form id="loginForm" method="POST" action="{{ route('Signin') }}">
                    @csrf
                    <div class="login-field">
                        <label for="exampleInputEmail1" class="form-label">Email id</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email id">
                        <img src="{{url('images/')}}//mail.svg" alt="">
                        <div class="alert alert-danger mt-1 mb-1 emailError" style="display: none;">Please enter email</div>
                    </div>
                    <div class="login-field">
                        <label for="exampleInputEmail1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password">
                        <div class="alert alert-danger mt-1 mb-1 passwordError" style="display: none;">Please enter password</div>
                    </div>
                    <button type="submit" class="login-m loginBtn">Log In</button>
                    <a class="mb-4" href="{{url('forgot-password')}}" style="float: right; margin-top: 4px;">Forgot Password?</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection