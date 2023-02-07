<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>{{env('APP_NAME')}}</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href='https://fonts.googleapis.com/css?family=PT+Sans&subset=latin' rel='stylesheet' type='text/css'>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- css link  -->
        <link rel="stylesheet" href="{{url('css/landing.css')}}">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="{{asset('/css/course.css')}}">
        <link rel="stylesheet" href="{{asset('/css/membership2.css')}}">
        <link rel="stylesheet" href="{{asset('/css/webinar.css')}}">
        <link rel="stylesheet" href="{{url('css/home.css')}}">
        <link rel="stylesheet" href="{{url('css/signup.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <style type="text/css">
                .loaderImage {
                       display: none;
                       position: fixed;
                       top: 0px;
                       right: 0px;
                       width: 100%;
                       height: 100%;
                       background-color: #000;
                       background-image: url('images/loading.gif');
                       background-repeat: no-repeat;
                       background-position: center;
                       z-index: 10000000;
                       opacity: 0.4;
                       filter: alpha(opacity=40); /* For IE8 and earlier */
                   }
        </style>

    </head>
    <script>
siteUrl = '<?php echo URL::to('/'); ?>/';
    </script>
    <body>
        <?php 
        use App\Models\UserSubscribedPlan;
        $subs=UserSubscribedPlan::join('subscriptions','subscriptions.id','user_subscribed_plans.subscription_id')->where('user_id',Auth::user()->id)->where('is_active',1)->select('subscriptions.plans','user_subscribed_plans.*')->first(); 

        
        ?>
        <header class="main-site">
            <div class="container">
                <div class="main-header">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="{{url('logo/Speak2Impact Academy.png')}}"   class="css-class" alt="alt text"></a>
                         </div>
                        
                        <!-- <a class="navbar-brand" href="#">Speak2Impact Academy</a> -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(1) === '/' ? 'active' : null }}" aria-current="page" href="{{url('/')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    
                                     @if (Auth::check() && (isset(Auth::user()->email_verified_at)) && Auth::user()->getUserSubscription(Auth::user()->id) == null)
                                     <?php ?>
                                    <a class="nav-link {{ Request::segment(1) === 'home' ? 'active' : null }}" href="{{url('home')}}"><i class="fa fa-lock" aria-hidden="true" color="black">X  </i>Courses</a>
                                    
                                    @else
                                    <a class="nav-link {{ Request::segment(1) === 'home' ? 'active' : null }}" href="{{url('home')}}">Courses</a>
                                    @endif
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(1) === 'calendly' ? 'active' : null }}" href="{{url('calendly')}}">Schedule meeting with Coach</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(1) === 'practise' ? 'active' : null }}"  href="{{url('practise')}}">Practice</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  {{ Request::segment(1) === 'webinars' ? 'active' : null }}" href="{{url('webinars')}}">Webinars</a>
                                </li>
                            </ul>
                        </div>

                        <div class="dropdown">
                            <!-- <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Dropdown button
                            </button> -->
                            <img data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle" id="dropdownMenuButton" src="{{url('images/user1.png')}}" alt="">
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <div>
                                    <a href="{{ route('vprofile') }}">View Profile</a>
                                </div>
                                <div>
                                    <?php if($subs != NULL){ ?>
                                        <span>{{$subs->plans}}</span><br><span>Expiring on {{$subs->subscription_end_date}} </span>;
                                    <?php }  else
                                        {
                                            if (Auth::user()->is_sign_up_free == 1){ ?>
                                                 Free Subscription
                                        <?php } else{ ?>

                                            Not Subsribed yet

                                        <?php }    

                                        } ?>
                                       
                                    

                                </div>
                                <div>
                                    <a href="{{ route('logout') }}">logout</a>
                                </div>

                            </div>
                        </div>






                    </nav>
                </div>
            </div>
        </header>
        <!-- END HEAD -->
