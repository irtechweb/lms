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
                <h1>From muddled to mesmerising </h1>
                <span style="font-weight: 500; font-size: 36px; line-height:46px; margin-top: 13px;">Share your story. Communicate to<br>connect. Frame, practice and deliver<br>talks that blow others away. </span>
            </div>
            <a href="{{route('register')}}" style="text-decoration: none;">
                <button>Join the Academy <img src="./images/ar.svg" alt=""></button>
            </a>
        </div>
    </div>
</div>

<div class="happy-client">
    <div class="container">
        <h2 class="mb-7">As featured in</h2>
        <div class="owl-carousel owl-theme">
            <div class="item"> <img src="{{url('images/featured/Black')}}/city-am.png" alt=""></div>
            <div class="item"><img src="{{url('images/featured/Black')}}/Daily Express.png" alt=""></div>
            <div class="item"><img src="{{url('images/featured/Black')}}/Daily Mail black.png" alt=""></div>
            <div class="item"><img src="{{url('images/featured/Black')}}/ELLE.png" alt=""></div>
            <div class="item"><img src="{{url('images/featured/Black')}}/Forbes.png" alt=""></div>
            <div class="item"><img src="{{url('images/featured/Black')}}/Stylist.png" alt=""></div>
            <div class="item"><img src="{{url('images/featured/Black')}}/The Independent.png" alt=""></div>
            <div class="item"><img src="{{url('images/featured/Black')}}/The Telegraph.png" alt=""></div>
            <div class="item"><img src="{{url('images/featured/Black')}}/The Times.png" alt=""></div>
            <div class="item"><img src="{{url('images/featured')}}/Metro.png" alt=""></div>
            <div class="item"><img src="{{url('images/featured')}}/New York Post.png" alt=""></div>
            <div class="item"><img src="{{url('images/featured')}}/We Are The City.png" alt=""></div>
        </div>
    </div>
</div>


<div class="fun-facts">
    <div class="container">
        <!--  <video width="800" height="500" controls poster="{{url('images/')}}/Frame_29.png"> -->
        <iframe src="{{ isset($promo_video_link) ? $promo_video_link.'?rel=0&autoplay=0&controls=0&modestbranding=1&origin=https://academy.susieashfield.com/' : 'https://www.youtube.com/embed/sIBcQil9ARA?rel=0&autoplay=0&controls=0&modestbranding=1&origin=https://academy.susieashfield.com/' }}" title="Introduction Video" frameborder="0"  allowfullscreen id="youtube_player"></iframe>
        {{-- <video width="800" height="500" controls>
            <source src="<?= isset($setting->promo_video_link)?$setting->promo_video_link:'movie.mp4'?>"
                type="video/mp4"> --}}
            <!-- <source src="movie.ogg" type="video/ogg"> -->
            {{-- Your browser does not support the video tag.
        </video> --}}
        <div class="fun-stats">
            <h2><span>Learn the art of public speaking</span> with Susie Ashfield</h2>
            <p>Join with a yearly membership and get access to free webinars, personalised coaching and a community of people like you</p>
            <div class="facts">
                <span><b class="counter">2</b>New courses<br>every month</span>
                <span><b class="counter">5</b>Coach feedback<br>on exercise videos</span>
                <span><b class="counter">80</b>Hours of videos</span>
            </div>
            <ul class="checks" style="font-size: 16px;">
                <li><img src="{{url('images/')}}/check.svg" alt="">Learn at your own pace</li>
                <li><img src="{{url('images/')}}/check.svg" alt="">Practice your pitch and get feedback from a pro</li>
                <li><img src="{{url('images/')}}/check.svg" alt="">Free Webinars to boost your skills further</li>
                <li><img src="{{url('images/')}}/check.svg" alt="">Get access to the best coaches in the field</li>
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
            <div class="item"><img src="{{url('images/trustedby/Black')}}/Lancashire.png" alt=""></div>
            <div class="item"><img src="{{url('images/trustedby/Black')}}/Lloyds.png" alt=""></div>
            <div class="item"><img src="{{url('images/trustedby/Black')}}/Rolls Royce.png" alt=""></div>
            <div class="item"><img src="{{url('images/trustedby/Black')}}/Walt Disney.png" alt=""></div>
            <div class="item"><img src="{{url('images/trustedby')}}/Coca Cola.png" alt=""></div>
            <div class="item"><img src="{{url('images/trustedby')}}/Debretts.png" alt=""></div>
            <div class="item"><img src="{{url('images/trustedby')}}/Generali.png" alt=""></div>
            <div class="item"><img src="{{url('images/trustedby')}}/NATO OTAN.png" alt=""></div>
            <div class="item"><img src="{{url('images/trustedby')}}/Royal Bank of Scotland.png" alt=""></div>
            <div class="item"><img src="{{url('images/trustedby')}}/S_P Global.png" alt=""></div>
            <div class="item"><img src="{{url('images/trustedby')}}/Santander-Logo.png" alt=""></div>
            <div class="item"><img src="{{url('images/trustedby')}}/The Wine Society 1874.png" alt=""></div>
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
                          $style = "border-radius: 6px; min-width: 246px;";
                          $checkimage = url('images/check.png');
                          
                        ?>
            @foreach($data as $key=>$record)
            <?php 

                            if($i>1 && $i%2 == 0){
                            $divclass = 'membership2';
                            $saave = 'saave2';
                            $divheading = 'heading2';
                            $style = "background-color: #1C1C1C; color: #ffffc8; border: 1px solid #1c1c1c; border-radius: 6px; min-width: 246px;";
                            $checkimage = url('images/check_black.png');

                          }
                        ?>
            <div class="col-lg-6 mb-60px" style="padding-right: 25px; padding-left: 25px;">
                <div class="{{$divclass}}">
                    <div class="mem-btn">
                        <button class="membership-btn" style="{{$style}}">{{ $record['plans'] == 'halfyearly' ? 'Half Yearly' : ($loop->iteration == 2 ? 'Impact Plus' : 'Impact') }}</button>
                    </div>
                    <h3 class="price">£{{$record['price']}} per year <span style="font-size: 16px;">+VAT</span></h3>

                    <p class="{{$saave}}" style="height: 24px;">
                        @if($key === 1) (Get “The King’s Speech” treatment)@endif</p>

                    <div style="min-height: 347px;" class="d-flex align-items-center">
                        @if($loop->iteration == 1)
                            <div>
                                <div class="d-flex"><p style="margin-right: 12px;"><img src="{{$checkimage}}"></p><p class="{{$divheading}}" style="margin-bottom: 12px;">Access to two new courses every month</p></div>
                                <div class="d-flex"><p style="margin-right: 12px;"><img src="{{$checkimage}}"></p><p class="{{$divheading}}" style="margin-bottom: 12px;">Access to exercises to practise what you learn</p></div>
                                <div class="d-flex"><p style="margin-right: 12px;"><img src="{{$checkimage}}"></p><p class="{{$divheading}}" style="margin-bottom: 12px;">5 practise video review[s] by a coach per month</p></div>
                                <div class="d-flex"><p style="margin-right: 12px;"><img src="{{$checkimage}}"></p><p class="{{$divheading}}" style="margin-bottom: 12px;">Unlimited access to Yoodli, the AI speech coaching technology</p></div>
                                <div class="d-flex"><p style="margin-right: 12px;"><img src="{{$checkimage}}"></p><p class="{{$divheading}}" style="margin-bottom: 12px;">30% discount on 1:1 coaching sessions</p></div>
                                <div class="d-flex"><p style="margin-right: 12px;"><img src="{{$checkimage}}"></p><p class="{{$divheading}}" style="margin-bottom: 12px;">A new educational webinar every month</p></div>
                                <div class="d-flex"><p style="margin-right: 12px;"><img src="{{$checkimage}}"></p><p class="{{$divheading}}" style="margin-bottom: 12px;">1 live monthly group Q&A session with Susie Ashfield</p></div>
                                <div class="d-flex"><p style="margin-right: 12px;"><img src="{{$checkimage}}"></p><p class="{{$divheading}}" style="margin-bottom: 12px;">1 live monthly group review video session with Susie Ashfield</p></div>
                            </div>
                        @else
                            <div>
                                <div class="d-flex fw-bolder"><p style="margin-right: 12px;"><img src="{{$checkimage}}"></p><p class="{{$divheading}}" style="margin-bottom: 12px;">All features of Impact</p></div>
                                <div class="d-flex"><p style="margin-right: 12px;"><img src="{{$checkimage}}"></p><p class="{{$divheading}}" style="margin-bottom: 12px;">A monthly 30-minute live coaching session with a coach of your choice. Worth over £ 2100</p></div>
                                <div class="d-flex"><p style="margin-right: 12px;"><img src="{{$checkimage}}"></p><p class="{{$divheading}}" style="margin-bottom: 12px;">Trained actors with years of experience in public speaking will transform you into a communication rockstar</p></div>
                                <div class="d-flex"><p style="margin-right: 12px;"><img src="{{$checkimage}}"></p><p class="{{$divheading}}" style="margin-bottom: 12px;">A bespoke approach for professionals who want a guided learning experience tailored to their needs</p></div>
                            </div>
                        @endif
                        {{-- <p class="{{$divheading}}"><span><img src="{{$checkimage}}"></span></p><p class="{{$divheading}}"><span><img src="{{$checkimage}}"></span></p> --}}
                    {{-- @if($record['is_access_cource'] == 1)
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
                    @endif --}}
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
                        <h5 style="color: #1C1C1C; font-size:24px; font-weight:500; margin-bottom: 4%; margin-top: 0%;">Sign up for Free</h5>
                        <p class="heading2" style="margin-bottom: 12px;">
                            <img src="./images/check.svg" alt="" style="margin-right: 1%;">
                            <?= isset($setting->free_sign_up)?$setting->free_sign_up:'Access to webinars and other pre-recorded content'?>
                            {{-- <span><img src="{{url('images/')}}/free-white.png"></span> --}}
                        </p>
                        <p class="heading2" style="margin-bottom: 24px;">
                            <img src="./images/check.svg" alt="" style="margin-right: 1%;">
                            <?= isset($setting->free_sign_up)?$setting->free_sign_up:'Access to Yoodli, the AI speech coaching technology'?>
                            {{-- <span><img src="{{url('images/')}}/free-white.png"></span> --}}
                        </p>
                        <button class="start-membershiIp" style="background-color:  #1C1C1C; color: #fff;"><a style="text-decoration: none; color: #FFF" href="{{url('register')}}">Sign up for Free</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript">
    $('button.start-membership').on('click',function(){
        location.replace($(this).attr('route'));
    })
</script>

@endsection('content')