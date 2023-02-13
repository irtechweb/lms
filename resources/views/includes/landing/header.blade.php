<div class="container" style="margin-top: 1.5rem!important; max-width: 1440px;">
          <header>
          <nav class="navbar" style="padding-left: 50px;padding-right: 50px;">
            <div class="logo">
           <img src="{{url('logo/Speak2Impact Academy.png')}}"   class="css-class" alt="alt text">
            </div>
            <div class="login-action">
                @if (Auth::check())
                  <a href="{{ route('logout') }}"><button class="login login-action-gap" >Logout</button></a>
                @else
                  @if (Auth::check() && Auth::user()->email_verified_at)
                    <a href="{{ route('logout') }}"><button class="login login-action-gap" >Logout</button></a>
                    <a href="{{route('membershipPlans')}}"><button class="start-learning">Start Learning</button></a>
                  @else
                    <a href="{{url('login')}}"><button class="login login-action-gap">Login</button></a>
                    @if(Request::segment(1) != "verify-email" )
                      <a href="{{route('register')}}"><button class="start-learning">Sign up</button></a>
                    @endif
                  @endif
                @endif  
            </div>
          </nav>
            @if (Session::has('error'))
            <div class="alert alert-error text-center">
                <p>{{ Session::get('error') }}</p>
            </div>
            @endif
        </header>
    </div>