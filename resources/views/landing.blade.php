@extends('layouts.landing')
@section('content')

<style>
    .fun-facts iframe {
        width: 350px;
        height: 350px;
        margin: 0 auto;
        display: block;
        margin-top: 50px;
        border-radius: 12px;
        cursor: pointer;
        background-color: #333333;
    }

    .mb-60px {
        margin-bottom: 60px;
    }

    @media(min-width:768px) {
        .fun-facts iframe {
            width: 800px;
            height: 500px;
        }
    }
</style>
@php
$promo_video_link = \App\Models\GeneralSetting::where('key','landing_page_video')->pluck('value')->first();

@endphp

<div class="hero">
    <div class="container">
        <div class="hero-top">
            <div class="hero-heading">
                <img src="./images/heading-bg2.svg"
                    style="--top-right:10px;--bottom-right:50px; background: radial-gradient(#ffffc8,#fff); z-index:-1;"
                    class="h-patteren">
                <h1>The Art of <br>Public Speaking </h1>
                <span>by<img src="./images/r1.png"><span class="wavy">Susie Ashfield</span></span>
            </div>
            <ul class="features">
                <li>✦ Learn at your pace</li>
                <li>✦ Free webinars</li>
                <li>✦ Schedule meeting with a Coach</li>
            </ul>
            <a href="{{route('register')}}" style="text-decoration: none;">
                <button>start learning <img src="./images/ar.svg" alt=""></button>
            </a>
        </div>
    </div>
</div>

<div class="happy-client">
    <div class="container">
        <h2 class="mb-7">As featured in</h2>
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
        <!--  <video width="800" height="500" controls poster="{{url('images/')}}/Frame_29.png"> -->
        <iframe src="{{ isset($promo_video_link) ? $promo_video_link.'?rel=0' : 'https://www.youtube.com/embed/sIBcQil9ARA?rel=0' }}" title="Introduction Video" frameborder="0"  allowfullscreen></iframe>
        {{-- <video width="800" height="500" controls>
            <source src="<?= isset($setting->promo_video_link)?$setting->promo_video_link:'movie.mp4'?>"
                type="video/mp4"> --}}
            <!-- <source src="movie.ogg" type="video/ogg"> -->
            {{-- Your browser does not support the video tag.
        </video> --}}
        <div class="fun-stats">
            <h2><span>Learn the art of public speaking</span> with Susie Ashfield</h2>
            <p>Join with yearly or monthly membership and get access to a our free webinars and schedule a meeting with
                coach</p>
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
                <p>“ Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.“</p>
            </div>

            <div class="review">
                <div class="client">
                    <img src="./images/r2.png" alt="">
                    <h3>Smantha James, CEO at Rivago</h3>
                </div>
                <p>“ Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.“</p>
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
<section class="membership">
    <h1 class="mt-5 mb-5"
        style="display: flex; justify-content: center; color: #1C1C1C; font-weight: 500; font-size: 40px;"> Membership
        Plans</h1>
    <div class="container">
        <div class="row">
            @if(isset($data) && !empty($data))
            <?php $i=1;
                          $divclass = 'membership1';
                          $saave = 'saave';
                          $divheading = 'heading';
                          $style = "border-radius: 6px;";
                          $checkimage = url('images/check.png');
                          
                        ?>
            @foreach($data as $key=>$record)
            <?php 

                            if($i>1 && $i%2 == 0){
                            $divclass = 'membership2';
                            $saave = 'saave2';
                            $divheading = 'heading2';
                            $style = "background-color: #1C1C1C; color: #fff; border: 1px solid #1c1c1c; border-radius: 6px;";
                            $checkimage = url('images/check_black.png');

                          }
                        ?>
            <div class="col-lg-6 mb-60px" style="padding-right: 25px; padding-left: 25px;">
                <div class="{{$divclass}}">
                    <div class="mem-btn">
                        <button class="membership-btn" style="{{$style}}">{{ $record['plans'] == 'halfyearly' ? 'Half Yearly' : ucfirst($record['plans']) }}
                            Membership</button>
                    </div>
                    <h3 class="price">£{{$record['price']}} {{ $record['plans'] == 'halfyearly' ? 'Half Yearly' : ucfirst($record['plans']) }}</h3>

                    <p class="{{$saave}}" style="height: 24px;">
                        @if($record['plans'] == "yearly")
                        (Save {{$record['discount_percentage']}}% on {{$record['plans']}})@endif</p>

                    <div style="min-height: 185px;">
                    @if($record['is_access_cource'] == 1)
                    <p class="{{$divheading}}"><span><img src="{{$checkimage}}"></span>Access to all courses</p>
                    @endif
                    <p class="{{$divheading}}"><span><img src="{{$checkimage}}"></span>{{$record['duration']}} mins of
                        1-to-1 with a coach per month</p>
                    <p class="{{$divheading}}"><span><img
                                src="{{$checkimage}}"></span>{{$record['discount_percentage']}}% discount on further
                        1-to-1 coaching sessions</p>
                    <p class="{{$divheading}}"><span><img src="{{$checkimage}}"></span>Coach feedback on
                        {{$record['feedback_video_count']}} videos on Yoodli per month</p>
                    @if($record['webinar_access'] == '1')
                    <p class="{{$divheading}}"><span><img src="{{$checkimage}}"></span>Access to webinars and other
                        pre-recorded content</p>
                    @endif

                    @if($record['yoodli_access'] == '1')
                    <p class="{{$divheading}}"><span><img src="{{$checkimage}}"></span>Access to Yoodli</p>
                    @endif
                    </div>
                    @if(auth()->check())
                    <?php 

                                    $route = route('paymentDetails',['user_id'=>(Crypt::encrypt(auth()->user()->id)),'subscription_id'=>(Crypt::encrypt($record['id']))]);
                                    $label = "Start membership";
                                ?>
                    @else
                    <?php
                                        $route = route('register');
                                        $label = "Start membership";
                                        ?>


                    @endif
                    <button class="start-membership" route="{{$route}}" style="{{$style}}">{{$label}} </button>
                </div>
            </div>
            <?php $i++;  ?>
            @endforeach
            @endif


        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12" style="padding-right: 25px; padding-left: 25px;">
                <div class="align-items-center justify-content-center">
                    <div class="Sign " style="border: 1px solid;">
                        <h5 style="color: #1C1C1C; font-size:24px; font-weight:500; margin-bottom: 4%; margin-top: 0%;">Sign
                            up for Free</h5>
                        <p class="heading2"><img src="./images/check.svg" alt="" style="margin-right: 1%;">
                            <?= isset($setting->free_sign_up)?$setting->free_sign_up:'Access to webinars and other pre-recorded content'?>
                            <span><img src="{{url('images/')}}/free-white.png">
                        </p>
                        <button class="start-membershiIp" style="
                                    background-color:  #1C1C1C; color: #fff;"><a style="text-decoration: none;
        color: #FFF" href="{{url('register')}}">Sign up for Free</a></button>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</section>

<script type="text/javascript">
    $('button.start-membership').on('click',function(){

        console.log($(this).attr('route'));
        location.replace($(this).attr('route'));
    })
</script>

@endsection('content')