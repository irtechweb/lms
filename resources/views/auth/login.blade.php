
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Speak2Impact</title>
    <!-- css link  -->.
    <link rel="stylesheet" href="{{url('css/')}}/login.css">
</head>
<body>
            <div class="container">
                <nav class="navbar">
                <div class="logo">  <img src="{{url('logo/logo.jpg')}}" height="70px" width="200px" class="css-class" alt="alt text"></div>
                <div class="login-action">
                <a href="{{route('register')}}"><button class="start-learning">Sign Up</button></a>
                </div>
            </nav>
            </div>
    <div class="container">
   <div class="row">
   <div class="h-100 d-flex align-items-center justify-content-center mt-5 mb-login">
   <div class="login-area">
            <h1>Log In</h1>
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
             <button type="button">   <img src="{{url('images/')}}/google.svg" alt="" /> <a href="{{url('login/google')}}" >  Log in with Google </a> </button>
                <button><img src="{{url('images/')}}/fb.svg" alt=""> <a href="{{url('login/facebook')}}" > Log in with Facebook </a></button>
                {{-- <button><img src="{{url('images/')}}/fb.svg" alt=""> Log in with Facebook</button> --}}
            </div>
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
          </form>
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
                 <a href="#">Sign up</a>
                 <a href="#">Login</a>
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

 <script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '3200592253586677',
      cookie     : true,
      xfbml      : true,
      version    : '{api-version}'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>