<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Speak2 Impact Academy</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href='https://fonts.googleapis.com/css?family=PT+Sans&subset=latin' rel='stylesheet' type='text/css'>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- css link  -->
        <link rel="stylesheet" href="{{asset('/css/course.css')}}">
        <link rel="stylesheet" href="{{asset('/css/membership2.css')}}">
        <link rel="stylesheet" href="{{asset('/css/webinar.css')}}">
        <link rel="stylesheet" href="{{url('css/home.css')}}">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"/>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </head>
    <script>
siteUrl = '<?php echo URL::to('/'); ?>/';
    </script>
    <body>
        <header class="main-site">
            <div class="container">
                <div class="main-header">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <img src="{{url('logo/logo.jpg')}}" height="80px"  class="css-class" alt="alt text">
                        <!-- <a class="navbar-brand" href="#">Speak2Impact Academy</a> -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(1) === 'home' ? 'active' : null }}" aria-current="page" href="{{url('home')}}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::segment(1) === 'practise' ? 'active' : null }}" href="#">Courses</a>
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
                                <a href="{{ route('logout') }}">logout</a>

                            </div>
                        </div>






                    </nav>
                </div>
            </div>
        </header>
        <!-- END HEAD -->
