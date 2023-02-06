@extends('layouts.web')
@section('content')
        
        <div class="container">
        <div class="row">
        <div class="h-100 d-flex align-items-center justify-content-center mt-5 mb-login">
        <div class="login-area" style="width: 460px;">
        <h1>Log In</h1>


        <span>Get started by filling up details below</span>
        <div class="login-option" >
         <button type="button">   <img src="{{url('images/')}}/google.svg" alt="" /> <a href="{{url('login/google')}}" style="color: #3f3f3f;    text-decoration: none;" >  Log in with Google </a> </button>
            <button><img src="{{url('images/')}}/fb.svg" alt=""> <a href="{{url('login/facebook')}}" style="color: #3f3f3f;    text-decoration: none;"> Log in with Facebook </a></button>
            {{-- <button><img src="{{url('images/')}}/fb.svg" alt=""> Log in with Facebook</button> --}}
        </div>
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('Signin') }}">
            @csrf
        <div class="login-field">
        <label for="exampleInputEmail1" class="form-label">Email id</label>
        <input type="email" name="email" class="form-control" placeholder="Enter email id">
        <img src="{{url('images/')}}//mail.svg" alt="">
         </div>
         <div class="login-field">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter password">
             </div>

        <button type="submit" class="login-m">Log In</button>
        <a class="mb-4" href="{{url('forgot-password')}}">Forgot Password?</a> 
        </form>
        </div>
        </div>
        </div>
        </div>
@endsection

  


  