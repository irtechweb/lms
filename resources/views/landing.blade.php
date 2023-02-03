<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Speak2Impact</title>
        <!-- css link  -->
        <link rel="stylesheet" href="{{url('css/landing.css')}}">
        <link rel="stylesheet" href="{{url('css/owl.carousel.css')}}">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <!-- Add the slick-theme.css if you want default styling -->
    </head>
    <body>
    <div class="container" style="margin-top: 0.5rem!important; max-width: 1440px;">
          <nav class="navbar">
            <div class="logo">
            <img src="{{url('logo/logo.jpg')}}" height="100px"  class="css-class" alt="alt text">
            </div>
            <div class="login-action">
            @if (Auth::check())
            <a href="{{ route('logout') }}"><button class="login mx-3">Logout</button></a>
            <a href="{{route('membershipPlans')}}"><button class="start-learning">Start Learning</button></a>
            @else
            <a href="{{url('login')}}"><button class="login mx-3">Login</button></a>
            <a href="{{route('register')}}"><button class="start-learning">Sign up</button></a>
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

        <div class="hero">
            <div class="container">
                <div class="hero-top">
                    <div class="hero-heading">
                        <img src="./images/heading-bg2.svg" alt="" style="--top-right:10px;--bottom-right:50px;background:radial-gradient(#ffffc88a,#fff); z-index:-1;" class="h-patteren">
                        <h1>The Art of </br>Public Speaking </h1>    
                        <span>by<img src="./images/r1.png" alt=""><span class="wavy">Susie Ashfield</span></span>                
                    </div>
                    <ul class="features">
                        <li>✦ Learn at your pace</li>
                        <li>✦ Free webinars</li>
                        <li>✦ Schedule meeting with a Coach</li>
                    </ul>
                 
                @if (Auth::check() && (isset(Auth::user()->email_verified_at) && !empty(Auth::user()->email_verified_at) ))
                <a href="{{route('membershipPlans')}}"><button>
                start learning
                <img src="./images/ar.svg" alt=""></button> </a>

               
                @else
                <button data-toggle="modal" data-target="#exampleModal">        
                start learning 
                <img src="./images/ar.svg" alt=""></button>
                @endif
                    
                    
                    
                </div>
            </div>
        </div>

        <div class="happy-client">
            <div class="container">
                <h2 class="mb-5">As featured in</h2>
                <div class="owl-carousel owl-theme">
                    <div class="item"> <img src="{{url('images/')}}/image-1.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/image-2.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/image-3.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/image-4.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/image-5.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/image-6.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/image-7.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/c1.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/c2.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/c3.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/c4.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/c5.png" alt=""></div>
                </div>
            </div>
        </div>


        <div class="fun-facts">
            <div class="container">
                <video width="800" height="500" controls poster="{{url('images/')}}/Frame_29.png">
                    <source src="movie.mp4" type="video/mp4">
                    <source src="movie.ogg" type="video/ogg">
                    Your browser does not support the video tag.
                </video> 
                <div class="fun-stats">
                    <h2><span>Learn the art of public speaking</span> with Susie Ashfield</h2>
                    <p>Join with yearly or monthly membership and get access to a our free webinars and schedule a meeting with coach</p>
                    <div class="facts">
                        <span><b class="counter">9</b>Chapters</span>
                        <span><b class="counter">62</b>Lessons</span>
                        <span><b class="counter">80</b>Hours of videos</span>
                    </div>
                    <ul class="checks">
                        <li><img src="{{url('images/')}}/check.svg" alt="">Learn at your own pace</li>
                        <li><img src="{{url('images/')}}/check.svg" alt="">Practice your pitch and get feedbacks</li>
                        <li><img src="{{url('images/')}}/check.svg" alt="">Free Webinars</li>
                        <li><img src="{{url('images/')}}/check.svg" alt="">Schedule meeting with a Coach</li>
                    </ul>
                </div>
            </div>
        </div>



        <div class="testimonial">
            <div class="container">

                <h2><span>Some professionals</span> talking about us </h2>
                <div class="reviews">
                    <div class="review">
                        <div class="client">
                            <img src="./images/r1.png" alt="">
                            <h3>Smantha James, CEO at Rivago</h3>
                        </div>
                        <p>“ Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.“</p>
                    </div>

                    <div class="review">
                        <div class="client">
                            <img src="./images/r2.png" alt="">
                            <h3>Smantha James, CEO at Rivago</h3>
                        </div>
                        <p>“ Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.“</p>
                    </div>
                </div>
            </div>
        </div>


        <div class="happy-client">
            <div class="container">
                <h2 class="mb-5">Trusted by</h2>
                <div class="owl-carousel trusted owl-theme">
                    <div class="item"><img src="{{url('images/')}}/c1.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/c2.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/c3.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/c4.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/c5.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/c1.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/c2.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/c3.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/c4.png" alt=""></div>
                    <div class="item"><img src="{{url('images/')}}/c5.png" alt=""></div>
                </div>
            </div>
        </div>

        <section class="membership ">
        <h1 class="mt-5 mb-5" style="display: flex; justify-content: center; color: #1C1C1C; font-weight: 500; font-size: 35px;"> Membership Plans</h1>
        <div class="container">
                    <div class="row">
                        <div class="col-lg-5 offset-sm-1">
                            <div class="membership1">
                                <div class="mem-btn">
                                <button class="membership-btn">Annually membership</button>
                                </div>
                                <h3 class="price">£1200</h3>
                                <p class="saave">(Save 30% on annually)</p>
                                <p class="heading"><span><img src="{{url('images/check.png')}}"></span>  Access to all courses</p>
                                <p class="heading"><span><img src="{{url('images/check.png')}}"></span>  40 mins of 1-to-1 with a coach per month</p>
                                <p class="heading"><span><img src="{{url('images/check.png')}}"></span>  30% discount on further 1-to-1 coaching sessions</p>
                                <p class="heading"><span><img src="{{url('images/check.png')}}"></span>  Coach feedback on 2 videos on Yoodli per month</p>
                                <p class="heading"><span><img src="{{url('images/check.png')}}"></span>  Access to webinars and other pre-recorded content <span><img src="{{url('images/free-white.png')}}"></span></p>
                                <p class="heading"><span><img src="{{url('images/check.png')}}"></span>  Access to Yoodli <span><img src="{{url('images/free-white.png')}}"></span></p>
                                <button class="start-membership">Start membership</button>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="membership2">
                            <div class="mem-btn">
                            <button class="membership-btn" style="background-color: #1C1C1C; color: #fff;">Monthly membership</button>
                            </div>
                    <h3 class="price">£150.00</h3>
                    <p class="saave2">(Save 10% on Monthly)</p>
                    <p class="heading2"><span><img src="{{url('images/check_black.png')}}"></span>  Access to all courses</p>
                    <p class="heading2"><span><img src="{{url('images/check_black.png')}}"></span>  40 mins of 1-to-1 with a coach per month</p>
                    <p class="heading2"><span><img src="{{url('images/check_black.png')}}"></span>  30% discount on further 1-to-1 coaching sessions</p>
                    <p class="heading2"><span><img src="{{url('images/check_black.png')}}"></span>  Coach feedback on 2 videos on Yoodli per month</p>
                    <p class="heading2"><span><img src="{{url('images/check_black.png')}}"></span>  Access to webinars and other pre-recorded content <span><img src="{{url('images/free-white.png')}}"></span></p>
                    <p class="heading2"><span><img src="{{url('images/check_black.png')}}"></span>  Access to Yoodli <span><img src="{{url('images/free-white.png')}}"></span></p>
                    <button class="start-membership" style="background-color:  #1C1C1C; color: #fff;">Start membership</button>
                            </div>
                        </div>
                    </div>
                 </div>                            
        </section>

           <div class="container pt-5">
                    <div class="row">
                        <div class="col-md-10 offset-sm-1">
                        <div class="align-items-center justify-content-center">
                        <div class="Sign " style="border: 1px solid;">
                                <h5 style="color: #1C1C1C; font-size:24px; font-weight:500; margin-bottom: 4%; margin-top: 0%;">Sign up for Free</h5>
                                <p class="heading2"><img src="./images/check.svg" alt="" style="margin-right: 1%;">Access to webinars and other pre-recorded content <span><img src="{{url('images/')}}/free-white.png"></p>
                                <button class="start-membershiIp" style="background-color:  #1C1C1C; color: #fff;">Sign for Free</button>
                            </div>
                        </div>
                        </div>
                    </div>
                 </div>


                            <footer>
                                <div class="container">
                                    <div class="footer">
                                        <div class="row">
                                            <div class="col-md-2">
                                               
                                                <div class="logo">
                                                     <img src="http://susieashfield.com/logo/Speak_2_Impact_Logo_Black_Bg_white.png" height="60px" class="css-class" alt="alt text">
                                                </div>
                                                
                                                
                                            </div>

                                            <div class="col-md-6 offset-sm-1">
                                                <h3 style="color:#FFFFC8; text-align: center;">©️ Speak2Impact Ltd 2023</h3>
                                                <div class="footer-link">
                                                    <a href="#" class="px-4">Cookie Policy</a>
                                                    <a href="#" class="px-4">Privacy Policy</a>
                                                    <a href="{{route('register')}}" class="px-4">Terms of Service</a>
                                                </div>
                                            </div>
                                            <div class="col-md-2 offset-sm-1">
                                                    <div class="footer-links">
                                                    <a href="#">Contact us</a>
                                                    <a href="#">info@speak2impact.com</a>
                                                    </div>

                                                    <div class="social-icon">
                                                    <a href="#"><img src="{{url('images/')}}/facebook.svg" alt=""></a>
                                                    <a href="#"><img src="{{url('images/')}}/Vector.svg" alt=""></a>
                                                    <a href="#"><img src="{{url('images/')}}/Vector.svg" alt=""></a>
                                                    </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </footer>
                            <script type="text/javascript" src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
                            <script>
$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        autoplay: true,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 3
            },
            1000: {
                items: 6
            }
        }
    });

    $('.counter').each(function () {
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 4000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

});
                            </script>

                            </body>
                            </html>