<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <title>Speak2 Impact Academy</title>
        <!-- css link  -->
        <link rel="stylesheet" href="{{asset('/css/membership2.css')}}">
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'></script>
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'></script>
    </head>
    <script>
$(document).ready(function () {

    var current_fs, next_fs, previous_fs; //fieldsets
    var opacity;
    $(".next").click(function () {

        current_fs = $(this).parent();
        next_fs = $(this).parent().next();

        //Add Class Active
        $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

        //show the next fieldset
        next_fs.show();
        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                next_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });

    $(".previous").click(function () {

        current_fs = $(this).parent();
        previous_fs = $(this).parent().prev();

        //Remove class active
        $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

        //show the previous fieldset
        previous_fs.show();

        //hide the current fieldset with style
        current_fs.animate({opacity: 0}, {
            step: function (now) {
                // for making fielset appear animation
                opacity = 1 - now;

                current_fs.css({
                    'display': 'none',
                    'position': 'relative'
                });
                previous_fs.css({'opacity': opacity});
            },
            duration: 600
        });
    });

    $('.radio-group .radio').click(function () {
        $(this).parent().find('.radio').removeClass('selected');
        $(this).addClass('selected');
    });

    $(".submit").click(function () {
        return false;
    });

});
    </script>

    <body>

        <header>
            <div class="container">
                <div class="header">
                    <div class="logo">
                        <h1>Speak2Impact Academy</h1>
                    </div>
                    @if(auth()->check())
                    <div class="login-action">
                        <!--{{auth()->user()->first_name}}-->
                        <a href="{{ route('logout') }}"><button class="login">Logout</button></a>

                    </div>
                    @else
                    <div class="login-action">
                        <button class="start-learning">Login</button>
                    </div>
                    @endif
                </div>

            </div>
        </header>
        <!-- MultiStep Form -->

        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
            <div class="">
                @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <p>{{ Session::get('success') }}</p>
                </div>
                @endif
                <div class="col-md-12 mx-0">
                    <form id="msform">
                        <!-- progressbar -->
                        @if(isset($data) && !empty($data))

                        <ul id="progressbar" style="display: flex; justify-content: center;">
                            <li class="active" id="account"><strong class="step-1" style="float: left; margin-left: -8%;">Select
                                    membership</strong></li>
                            <li onclick="paymentPlanFunction()"  id="confirm"><strong class="step-1" style="float: right; margin-right: -8%;">Payment details</strong></li>
                        </ul>
                        <!-- fieldsets -->
                        <fieldset>
                            <div class="container">
                                <h1 style="display: flex; justify-content: center; color: #1C1C1C; font-weight: bold; font-size: 35px;">
                                    Select membership plan
                                </h1>
                                <div class="row">
                                     <div class="membership-area">
                                    @foreach($data as $key=>$record)
                                    @if(strtolower($record['plans']) == 'yearly' || strtolower($record['plans']) == 'anually')
                                    <div class="membership-plan" style="border: 1px solid;">
                                        <button class="start-membershipp">{{ucfirst($record['plans'])}} membership</button>
                                        <h3 style="margin-top: 15%;">£{{$record['price']}} per year</h3>
                                        <p class="saave">(Save {{$record['discount_percentage']}}% on {{$record['plans']}})</p>
                                        @if($record['is_access_cource'] == 1)
                                        <p class="heading"><span><img src="{{url('images/check.png')}}"></span>Access to all courses</p>
                                        @endif
                                        <p class="heading"><span><img src="{{url('images/check.png')}}"></span>{{$record['duration']}} mins of 1-to-1 with a coach per month</p>
                                        <p class="heading"><span><img src="{{url('images/check.png')}}"></span>{{$record['discount_percentage']}}% discount on further 1-to-1 coaching sessions</p>
                                        <p class="heading"><span><img src="{{url('images/check.png')}}"></span>Coach feedback on {{$record['feedback_video_count']}} videos on Yoodli per month</p>
                                        @if($record['webinar_access'] == '1')
                                        <p class="heading"><span><img src="{{url('images/check.png')}}"></span>Access to webinars and other pre-recorded content</p>
                                        @endif
                                        @if($record['yoodli_access'] == '1')
                                        <p class="heading"><span><img src="{{url('images/check.png')}}"></span>Access to Yoodli</p>
                                        @endif
                                        @if(auth()->check())
                                        <a href="{{route('paymentDetails',['user_id'=>(Crypt::encrypt(auth()->user()->id)),'subscription_id'=>(Crypt::encrypt($record['id']))])}}" type ="button" class="btn start-membership" style="background-color:  #FDF8C8; color: black;">Start membership</a>

                                        @else
                                        <a href="{{route('home')}}" type ="button" class="btn start-membership" style="background-color:  #FDF8C8; color: black;">Sign Up</a>

                                        @endif
                                        @else
                                                <div class="membership-plan2" style="border: 1px solid #1c1c1c;">
                                                    <button class="start-membershipp"
                                                            style="background-color: #1C1C1C; color: #fff;">{{ucfirst($record['plans'])}} membership</button>
                                                    <h3 style="margin-top: 15%;">£{{$record['price']}} per year</h3>
                                                    <p class="saave2">(Save {{$record['discount_percentage']}}% on {{$record['plans']}})</p>
                                                    @if($record['is_access_cource'] == 1)
                                                    <p class="heading2"><span><img src="{{url('images/check_black.png')}}"></span> Access to all courses</p>
                                                    @endif
                                                    <p class="heading2"><span><img src="{{url('images/check_black.png')}}"></span> {{$record['duration']}} mins of 1-to-1 with a coach per month</p>
                                                    <p class="heading2"><span><img src="{{url('images/check_black.png')}}"></span> {{$record['discount_percentage']}}% discount on further 1-to-1 coaching sessions</p>
                                                    <p class="heading2"><span><img src="{{url('images/check_black.png')}}"></span> Coach feedback on {{$record['feedback_video_count']}} videos on Yoodli per month</p>
                                                    @if($record['webinar_access'] == '1')
                                                    <p class="heading2"><span><img src="{{url('images/check_black.png')}}"></span> Access to webinars and other pre-recorded content</p>
                                                    @endif
                                                    @if($record['yoodli_access'] == '1')
                                                    <p class="heading2"><span><img src="{{url('images/check_black.png')}}"></span> Access to Yoodli</p>
                                                    @endif
                                                    @if(auth()->check())
                                                    <a href="{{route('paymentDetails',['user_id'=>(Crypt::encrypt(auth()->user()->id)),'subscription_id'=>(Crypt::encrypt($record['id']))])}}" type ="button" class="btn start-membership" style="background-color:  #1C1C1C; color: #fff;">Start membership</a>

                                                    <!--                                            <form action = 'post'>
                                                                                                    <button class="start-membership"
                                                                                                            style="background-color:  #1C1C1C; color: #fff;">Start membership</button>
                                                                                                </form>-->
                                                    @else
                                                    <a href="{{route('home')}}" type ="button" class="btn start-membership" style="background-color:  #1C1C1C; color: #fff;">Sign Up</a>

                                                    @endif
                                                    @endif

                                                </div>
                                        @endforeach
                                    </div>

                                    <!-- Membership Plan Start-->
                                  
                                    <!-- Membership Plan ends -->
                                    @if(auth()->check())
                                    <div class="container pt-5">
                                    <div class="row">
                                                <div class="align-items-center justify-content-center">
                                                <div class="Sign " style="border: 1px solid;">
                                                        <h5 style="color: #1C1C1C; font-size:24px; font-weight:500; margin-bottom: 4%; margin-top: 0%;">Sign up for Free</h5>
                                                        <p class="heading2"><img src="./images/check.svg" alt="" style="margin-right: 1%;">Access to webinars and other pre-recorded content <span><img src="{{url('images/')}}/free-white.png"></p>
                                                        <button class="start-membershiIp" style="background-color:  #1C1C1C; color: #fff;">Sign for Free</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                </div>
                              

                                <!--<input type="button" name="next" class="next action-button" value="Next Step" />-->
                        </fieldset>
                        <fieldset>
                            <div class="form-card col-sm-12 col-md-6 col-lg-6">
                                <div class="membership-payment">
                                    <h1>Payment details</h1>
                                    <form>
                                        <div class="membership-field">
                                            <label for="exampleInputEmail1" class="form-label">Card number</label>
                                            <input type="text" class="form-control f-img"
                                                   placeholder="Enter credit card name">
                                            <img src="./images/credit_card.svg" alt="">
                                            <div class="master-card">
                                                <a href="#"><img src="./images//visa.svg" alt=""></a>
                                                <a href="#"><img src="./images/m-card.svg" alt=""></a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="membership-field m-half">
                                                <label for="exampleInputEmail1" class="form-label">Expiry date</label>
                                                <input type="text" class="form-control" placeholder="DD/MM/YYYY">
                                            </div>
                                            <div class="membership-field m-half">
                                                <label for="exampleInputEmail1" class="form-label">CVV</label>
                                                <input type="text" class="form-control" placeholder="Enter CVV">
                                            </div>
                                        </div>


                                        <div class="devider-line"></div>
                                        <div class="row" style="margin-bottom: 5%;">
                                            <div class="membership-field m-half">
                                                <span for="exampleInputEmail1"
                                                      style="font-weight: bold; color: black; font-size: 18px;"
                                                      class="form-label">Total</span>

                                            </div>
                                            <div class="membership-field m-half">
                                                <span for="exampleInputEmail1"
                                                      style="float: right; font-weight: bold; color: #1C1C1C; font-size: 18px;"
                                                      class="form-label">£1200 per year</span>
                                            </div>
                                        </div>
                                        <!-- <h1 style="align-items: left;">Title</h1>
                                        <h2 style="align-items: right;" align="right">Context</h2> -->
                                        <!-- <div class="row" style="color: #1C1C1C;">
                                            <div>
                                                <p>Total</p>
                                                <p>£1200 per year</p>
                                            </div>
                                            <div>
                                                <p>£1200 per year</p>
                                            </div>
                                        </div> -->
                                        <button type="submit" class="m-payment"
                                                style="background-color: #1C1C1C; color: #fff;"> Start membership</button>
                                        <div class="container">
                                            
                                        </div>
                                        <button style="margin-top: 5%;" type="submit" class="m-payment"><img
                                                src="./images/pp.svg" alt=""> Pay with
                                            Paypal</button>
                                    </form>
                                </div>
                            </div>

                            <!-- <div class="form-card col-sm-12 col-md-6 col-lg-6">
                                            <form>
                                                <div class="membership-field">
                                                <label for="exampleInputEmail1" class="form-label">Card number</label>
                                                <input type="text" class="form-control f-img" placeholder="Enter credit card name">
                                                <img src="./images/credit_card.svg" alt="">
                                                <div class="master-card">
                                                    <a href="#"><img src="./images//visa.svg" alt=""></a>
                                                    <a href="#"><img src="./images/m-card.svg" alt=""></a>
                                                </div>
                                                 </div>
                                                 <div class="membership-field m-half">
                                                    <label for="exampleInputEmail1" class="form-label">Expiry date</label>
                                                    <input type="text" class="form-control" placeholder="DD/MM/YYYY">
                                                     </div>
                                                     <div class="membership-field m-half">
                                                        <label for="exampleInputEmail1" class="form-label">CVV</label>
                                                        <input type="text" class="form-control" placeholder="Enter CVV">
                                                         </div>
                                                         <div class="devider-line"></div>
                                                         <button type="submit" class="m-payment"><img src="./images/pp.svg" alt=""> Pay with Paypal</button>
                                                         </form>
                                                        </div> -->

                            <!--<input type="button" name="previous" class="previous action-button-previous" value="Previous" />-->
                        </fieldset>
                        @else
                        <h1>No Plan Available</h1>
                        @endif
                    </form>

                </div>

            </div>

        </div>






        <!-- <div class="membership-area">
            <div class="membership-payment">
                <h1>Membership</h1>
                <span>Select membership plan for monthly or yearly</span>
                <form>
                    <div class="membership-field">
                    <label for="exampleInputEmail1" class="form-label">Card number</label>
                    <input type="text" class="form-control f-img" placeholder="Enter credit card name">
                    <img src="./images/credit_card.svg" alt="">
                    <div class="master-card">
                        <a href="#"><img src="./images//visa.svg" alt=""></a>
                        <a href="#"><img src="./images/m-card.svg" alt=""></a>
                    </div>
                     </div>
                     <div class="membership-field m-half">
                        <label for="exampleInputEmail1" class="form-label">Expiry date</label>
                        <input type="text" class="form-control" placeholder="DD/MM/YYYY">
                         </div>
                         <div class="membership-field m-half">
                            <label for="exampleInputEmail1" class="form-label">CVV</label>
                            <input type="text" class="form-control" placeholder="Enter CVV">
                             </div>
                             <div class="devider-line"></div>
                             <button type="submit" class="m-payment"><img src="./images/pp.svg" alt=""> Pay with Paypal</button>
                             </form>
            </div>
            <div class="membership-plan">
                <div class="toggle-membership">
                    Monthly
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                      </div>
                    Annually
                </div>
                <h3>$3588.00</h3>
                <h6>Annual membership<span>$299.00/month</span></h6>
                <button class="start-membership">Start membership</button>
                <a href="#">Sign up for free</a>
            </div>
        </div> -->

        <footer>
                                <div class="container">
                                    <div class="footer">
                                        <div class="footer-top">
                                            <div class="footer-logo"><span>Speak2Impact Academy</span></div>
                                            <div class="footer-link">
                                                <a href="#">Contact us</a>
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
        <script>
            function paymentPlanFunction() {
                alert('Please select a membership plan first!');
            }
        </script>
    </body>

</html>