@extends('layouts.landing')
@section('content')
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
        <!-- MultiStep Form -->
        <div class="col-lg-12 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
            <div class="">
                <!-- @if (Session::has('success'))
                <div class="alert alert-success text-center">
                    <p>{{ Session::get('success') }}</p>
                </div>
                @endif -->
                <div class="col-md-12 mx-0">
                        <!-- progressbar -->
                        @if(isset($data) && !empty($data))

                        <ul id="progressbar" style="display: flex; justify-content: center;">
                            <li class="active" id="account"><strong class="step-1" style="float: left; margin-left: -8%;">Select
                                    membership</strong></li>
                            <li onclick="paymentPlanFunction()"  id="confirm"><strong class="step-1" style="float: right; margin-right: -8%;">Payment details</strong></li>
                        </ul>
                        <!-- fieldsets -->
                        <fieldset>
                            <form id="membership_plan" method="POST" action="{{route('paymentDetails')}}">
                                @csrf
                                <input type="hidden" id="selected-plan" name="selected-plan">
                            <div class="container">
                                <div class="row">
                                    @if(isset($data['plans']) && !empty($data['plans']))
                                    <?php $i=1;
                                      $divclass = 'membership1';
                                      $saave = 'saave';
                                      $divheading = 'heading';
                                      $style = "";
                                      $checkimage = url('images/check.png');
                                      
                                    ?>
                                    @foreach($data['plans'] as $key=>$record)
                                    <?php 
            
                                        if($i>1 && $i%2 == 0){
                                        $divclass = 'membership2';
                                        $saave = 'saave2';
                                        $divheading = 'heading2';
                                        $style = "background-color: #1C1C1C; color: #fff;";
                                        $checkimage = url('images/check_black.png');
            
                                      }
                                    ?>
                                    <div class="col-lg-6" >
                                        <div class="{{$divclass}}">
                                            <div class="mem-btn">
                                            <button class="membership-btn" style="{{$style}}">{{ucfirst($record['plans'])}} membership</button>
                                            </div>
                                            <h3 class="price">£{{$record['price']}} {{ucfirst($record['plans'])}}</h3>
                                            
                                            <p class="{{$saave}}">
                                                    @if($record['plans'] == "yearly")
                                            (Save {{$record['discount_percentage']}}% on {{$record['plans']}})@endif</p>
                                            
                                             @if($record['is_access_cource'] == 1)
                                            <p class="{{$divheading}}"><span><img src="{{$checkimage}}"></span>Access to all courses</p>
                                            @endif
                                           <p class="{{$divheading}}"><span><img src="{{$checkimage}}"></span>{{$record['duration']}} mins of 1-to-1 with a coach per month</p>
                                            <p class="{{$divheading}}"><span><img src="{{$checkimage}}"></span>{{$record['discount_percentage']}}% discount on further 1-to-1 coaching sessions</p>
                                            <p class="{{$divheading}}"><span><img src="{{$checkimage}}"></span>Coach feedback on {{$record['feedback_video_count']}} videos on Yoodli per month</p>
                                            @if($record['webinar_access'] == '1')
                                            <p class="{{$divheading}}"><span><img src="{{$checkimage}}"></span>Access to webinars and other pre-recorded content</p>
                                            @endif
                                            
                                            @if($record['yoodli_access'] == '1')
                                            <p class="{{$divheading}}"><span><img src="{{$checkimage}}"></span>Access to Yoodli</p>
                                            @endif
                                            @if(auth()->check())
                                            <?php 
            
                                                $route = route('paymentDetails',['subscription_id'=>(Crypt::encrypt($record['id']))]);
                                                $label = "Start membership";
                                            ?>
                                            @else
                                                   <?php
                                                    $route = route('register');
                                                    $label = "Start membership";
                                                    ?>
                                             @endif 
                                            <button  class="start-membership" value="{{$record['id']}}" style="{{$style}}">{{$label}} </button> 
                                        </div>
                                    </div>
                                    <?php $i++;  ?>
                                     @endforeach
                                     @endif
                                </div>
                            </div> 
                        </form>  
                        </fieldset>
                        @else
                        <h1>No Plan Available</h1>
                        @endif
                    </form>
                   @if(!isset($data['hide_free_signup']))
                    <form id="sign-up-free" method="POST" action="{{route('free-plan')}}">
                        @csrf
                    <div class="container pt-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="align-items-center justify-content-center">
                                    <div class="Sign " style="border: 1px solid;">
                                        <h5 style="color: #1C1C1C; font-size:24px; font-weight:500; margin-bottom: 4%; margin-top: 0%;">Sign up for Free</h5>
                                        <p class="heading2"><img src="./images/check.svg" alt="" style="margin-right: 1%;">Access to webinars and other pre-recorded content <span><img src="{{url('images/')}}/free-white.png"></p>
                                        <button class="start-membershiIp" style="background-color:  #1C1C1C; color: #fff;">Sign for Free</button>
                                        <input type="hidden" name="free_membership" id="free_membership" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>
                   @endif 
                </div>
            </div>
        </div>
 @endsection
@section('scripts')
<script>
  <!-- Your scripts here -->
  $(document).ready(function() {
    $('.start-membership').click(function() {
        var selectedPlan = $(this).val();
        $('#selected-plan').val(selectedPlan);
        $('#membership_plan').submit();
    });
});

function paymentPlanFunction() {
    alert('Please select a membership plan first!');
}
</script>
@endsection