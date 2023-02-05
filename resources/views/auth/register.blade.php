@extends('layouts.web')
@section('content')



    <div class="container  mt-4">
                <nav class="navbar">
                    <div class="logo">  <img src="{{url('logo/Speak2Impact Academy.png')}}" height="70px" width="200px" class="css-class" alt="alt text"></div>
                    <div class="login-action">
                    <a href="{{route('login')}}"><button class="start-learning">Login</button></a>                </div>
                </nav>
    </div>
 
    <div class="container">
   <div class="row">
   <div class="h-100 d-flex align-items-center justify-content-center mt-5 mb-login">
   <div class="login-area" style="width: 612px;">
            <h1>Sign Up</h1>
 
            <span>Get started by filling up details below</span>
            <div class="login-option">
                <button type="button"> <img src="{{url('images/')}}/google.svg" alt="" /><a href="{{url('login/google')}}" style="color: #3f3f3f;    text-decoration: none;">  Log in with Google </a> </button>
                <button style="color: #3f3f3f;    text-decoration: none;"><img src="{{url('images/')}}/fb.svg" alt=""> Log in with Facebook</button>
                {{-- <button><img src="{{url('images/')}}/fb.svg" alt=""> Log in with Facebook</button> --}}
            </div>
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form method="POST" action="{{ route('register') }}">
            @csrf
             <div class="row">
                <div class="col-lg-6">
                <div class="signup-field">
                <label for="exampleInputEmail1" class="form-label">First Name</label>
                <input type="text" class="form-control f-img" name="first_name" required="required" placeholder="Enter last name">
                <img src="{{url('images/')}}/person.svg" alt="">
                 </div>
                </div>
                <div class="col-lg-6">
                <div class="signup-field">
                <label for="exampleInputEmail1" class="form-label">Last Name</label>
                <input type="text" class="form-control f-img" name="last_name" required="required" placeholder="Enter last name">
                <img src="{{url('images/')}}/person.svg" alt="">
                 </div>
            </div>        
            </div>

            <div class="row">
        <div class="col-lg-6">
            <div class="signup-field">
                    <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                    <input type="text" class="form-control f-img" name="phone_number" required="required" placeholder="Enter phone number">
                    <img src="{{url('images/')}}/call.svg" alt="">
                     </div>
            </div>
            <div class="col-lg-6">
            <div class="signup-field">
                    <label for="exampleInputEmail1" class="form-label">Email id</label>
                    <input type="email" class="form-control" name="email" required="required" placeholder="Enter email id">
                    <img src="{{url('images/')}}//mail.svg" alt="">
                     </div>
            </div>
        </div>

            <div class="row">
        <div class="col-lg-6">
            <div class="signup-field">
                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required="required" placeholder="Enter password">
                 </div>
            </div>
                 <div class="col-lg-6">
                 <div class="signup-field">
                    <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" required="required" placeholder="Confirm Password">
                     </div>
                 </div>
               
            <div class="col-lg-6">
            <div class="signup-field">
                        <label for="exampleInputEmail1" class="form-label">City</label>
                        <input type="text" class="form-control f-img" name="city" placeholder="City">
                        <img src="{{url('images/')}}/location_on.svg" alt="">
                         </div>
            </div>
        </div>
            <button type="submit" class="login-m">Sign up</button>
          </form>
    </div>
</div>
   </div>
</div>

@endsection

    
