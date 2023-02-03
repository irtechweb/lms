


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Speak2Impact</title>
    <!-- css link  -->
    <link rel="stylesheet" href="{{url('css/')}}/signup.css">

    <link rel="stylesheet" href="{{url('css/')}}/login.css">
    
</head>
<body>
    <div class="container  mt-4">
                <nav class="navbar">
                    <div class="logo">  <img src="{{url('logo/logo.jpg')}}" height="70px" width="200px" class="css-class" alt="alt text"></div>
                    <div class="login-action">
                    <a href="{{route('login')}}"><button class="start-learning">Login</button></a>                </div>
                </nav>
    </div>
 
    <div class="container">
   <div class="row">
   <div class="h-100 d-flex align-items-center justify-content-center mt-5 mb-login">
   <div class="login-area">
        <div class="row">
            <div class="col-md-8 offset-sm-2">
            <h1>Sign Up</h1>
 @if (Session::has('error'))
                    <div class="alert alert-error text-center">
                        <p>{{ Session::get('error') }}</p>
                    </div>
                    @elseif(Session::has('success'))
                    <div class="alert alert-success text-center">
                        <p>{{ Session::get('success') }}</p>
                    </div>

                    @endif
            <span>Get started by filling up details below</span>
            <div class="login-option">
                <button type="button"> <img src="{{url('images/')}}/google.svg" alt="" /><a href="{{url('login/google')}}" >  Log in with Google </a> </button>
                <button><img src="{{url('images/')}}/fb.svg" alt=""> Log in with Facebook</button>
                {{-- <button><img src="{{url('images/')}}/fb.svg" alt=""> Log in with Facebook</button> --}}
            </div>
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
   </div>
</div>

    <footer>
        <div class="container">
         <div class="footer">
             <div class="footer-top">
             <div class="footer-logo"><span>Speak2Impact Academy</span></div>
             <div class="footer-link">
                 <a href="#">Contact US</a>
                 <a href="#">Speak2impact</a>
                 <a href="{{route('register')}}">Sign up</a>
                 <a href="{{route('login')}}">Login</a>
             </div>
         </div>
         <div class="social-icon mt-3">
             <a href="#"><img src="{{url('images/')}}/Instagram.svg" alt=""></a>
             <a href="#"><img src="{{url('images/')}}/facebook.svg" alt=""></a>
             <a href="#"><img src="{{url('images/')}}/Vector.svg" alt=""></a>
         </div>
         </div>
        </div>
     </footer>
 </body>
 </html>
