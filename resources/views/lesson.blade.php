@extends('layouts.main')
@section('content')

<?php //dd($completed_lesson_count,$totalquiz);
$completion_per = ($totalquiz>0)?($completed_lesson_count/$totalquiz*100):0;
//dd("here");
?>
  <!-- ===============   Practice Start   ============== -->
  <div class="daily-goals">
    <div class="container-main">
      <div class="daily-goal">
        <div class="trophy">
          <img src="{{url('images/trophy.png')}}" alt="">
        </div>
        <div class="daily-progress">
          <h3>Daily Goals<span><img src="{{url('images/edit.svg')}}" alt="">Edit Goals</span></h3>
          <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: {{$completion_per}}%" aria-valuenow="{{$completion_per}}" aria-valuemin="0"
              aria-valuemax="100"></div>
          </div>
          <small>{{$completed_lesson_count}} / {{$totalquiz}} </small>
        </div>
      </div>
    </div>
  </div>
  <!-- ===============   Practice End   ============== -->
  <!-- ===============   Chapter Start   ============== -->
  @php $sectioncount = '1'; $lecturecount = '1'; $quizcount = '1'; @endphp
  
  <div class="chapter-detail">
    <div class="container-main">
      <div class="chapter-detail-content">
        <div class="chapter-header">
          <h6>Chapter {{$sectioncount}}: {{ $sections[$sectioncount-1]->title}}</h6>
          <h1>{{$course['course_title']}}</h1>
          {{-- <h6>{{$course['name']}}, Instructor</h6> --}}
        </div>
        <div class="chapter-playlist">
          <div class="chapter-video">
          <?php 
                //dd($course['course_video']);
                //$first_video = ($course->getvideoinfo($course['course_video'])[0]);
                if(isset($first_video))
                {
                    $file_name = $first_video->video_title."?title=0&byline=0&portrait=0&speed=0&badge=0&autopause=0&share=0";
                ?>
            <?php                 
                }else{
                $file_name = $first_video->video_title."?title=0&byline=0&portrait=0&speed=0&badge=0&autopause=0&share=0";
                }
                ?>
              <div  id="play_lesson" style="padding:58.00% 0 0 0;position:relative;">
                <iframe id="videoId" src="{{url($file_name)}}" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen frameborder="0" 
                style="position:absolute;top:0;left:0;width:100%;height:100%;">
                </iframe>
              </div>
          </div>
          <div class="chapter-list" Style="min-height: 422px;">
            <div class="accordion" id="accordionExample">
           
            @foreach($sections as $section) 
            <?php //dd($slectedsessionid);
                  $acc = "secacc".$section->section_id;
                  
                  $show = ($section->section_id == $slectedsessionid)?"show":"";
                  
             ?> 
            <div class="accordion-item" sect="{{$section->section_id}}" Selectedsession="{{$slectedsessionid}}">
                <h2 class="accordion-header" id="headingOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#{{$acc}}"
                    aria-expanded="true" aria-controls="collapseOne">
                    Chapter {{$sectioncount}}: {{ $section->title}}
                  </button>
                </h2>
                <div id="{{$acc}}" class="accordion-collapse collapse {{$show}}" aria-labelledby="headingOne"
                  data-bs-parent="#accordionExample">
                  <div class="accordion-body">

                   @foreach($lecturesquiz[$section->section_id] as $lecturequiz)
                    <?php 
                    $videopath = "";
                    if($lecturequiz->media == NULL)
                      $video=null;
                    else
                      $video = $course_video[$lecturequiz->media];
                   
                    if($video != null)
                    //$videopath = url('course/'.$video->course_id.'/'.$video->video_title.'.'.$video->video_type);
                    //$videopath ='https://player.vimeo.com/video/800179717';
                    $videopath =$video->video_title."?title=0&byline=0&portrait=0&speed=0&badge=0&autopause=0&share=0";
                    //dd($lecturesnotes[$section->section_id][$lecturequiz->lecture_quiz_id]);
                    if((isset($lecturesnotes[$section->section_id][$lecturequiz->lecture_quiz_id]) && isset($lecturesnotes[$section->section_id][$lecturequiz->lecture_quiz_id]->completed) && $lecturesnotes[$section->section_id][$lecturequiz->lecture_quiz_id]->completed == 1 ))
                      $cl =  "done-video";
                    else if($lecturequiz->lecture_quiz_id == $selectedlesson)
                      $cl =  "selected-video";
                    else
                      $cl = "active-video"; ?>


                    <a href="javascript:none;">
                    <div  class="play-list {{$cl}}">
                     <!-- @if($video != null)  -->                    
                     <img onclick="play(this)" class="play" attr="{{$videopath}}" alt="" src="{{url('images/Play button.svg')}}" >
                    <!--  @else -->
                     <!-- <img src="{{url('images/Play button.svg')}}" alt="">
                     @endif -->
                  
                      <span>{!! $lecturequiz->title !!}<small style= "float:right"> 2:01 mins</small></span> 
                    </div>
                    </a>
                    @php
                    @endphp
                    @endforeach   
              
                  </div>
                </div>
              </div>
              <?php $sectioncount++; ?>
            @endforeach   
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <!-- ===============   Chapter End   ============== -->
  <div class="chapter-tabs">
    <div class="container-main">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
            type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"
            role="tab" aria-controls="nav-profile" aria-selected="false">Notes</button>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
          <div class="row">
            <div class="col-md-10">
              <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              @php 
              if(isset($quiz_description))
              {
              echo $quiz_description;
              }else{
              echo "No description";
              }
              @endphp
              </div>
              </div>
          </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <span id="save_notes"> </span>
          <form class="text_area">
            <input id="iscomplete" name="iscomplete" value=0 type='hidden'>
            <input id="course_id" name="course_id" value="{{$course->id}}" type='hidden'>
            <input id="lesson_id" name="lesson_id" value="{{$selectedlesson}}" type='hidden'>
            <textarea style="overflow: auto;
    resize: vertical;
    border: none;
    width: 100%;
    background-color: #eeeeee;" class="text_area_value" rows="5" cols="33" placeholder="Write something" <?= (isset($notes->completed) && $notes->completed == 1 )?"readonly":"";?>> 
           @if(isset($notes->notes))
           <?= trim($notes->notes) ?>
           @endif
            </textarea>
            <button id="complete" <?= (isset($notes->completed) && $notes->completed == 1 )?"disabled":"";?> class="btn btn-custom pull-right" style="margin-top: 2px"><i class="fa fa-check"></i>&nbsp; Completed</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- ================   Modal   =============== -->
  <!-- <div class="action" ">
    <div style="display: flex; justify-content: center; margin-bottom: 2%;" class="container-main">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Get full access
      </button>
    </div>
  </div> -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="background-color: #fff0 !important;    border: 1px solid rgb(0 0 0 / 0%) !important;">
        <div class="modal-body" style="margin-left: 3%">
          <div class="membership-plan-pop">
            <i class="fa fa-lock"></i>
            <h3>Get full access</h3>
            <i class="fas fa-band-aid"></i>
            <div class="toggle-membership">
              Monthly
              <div class="form-check form-switch">
                <input class="form-check-input"  type="checkbox" id="flexSwitchCheckDefault">
              </div>
              Annually
            </div>
            <h3><span id="plan-price" > @if(isset($subscriptionPlanMonthly->price)) ${{$subscriptionPlanMonthly->price}}.00 @else $0.00 @endif </span></h3>
            <h6>Annual membership<span>$<?php  echo isset($subscriptionPlanAnually->price) ? number_format($subscriptionPlanAnually->price/12,2):'0' ?>/month</span></h6>
            <?php $plan = isset($subscriptionPlanMonthly)?$subscriptionPlanMonthly:$subscriptionPlanAnually; ?>
           <!--  <a href="{{route('membershipPlans')}}"> <button class="start-membership">Start membership</button></a> -->


             <a href="{{route('paymentDetails',['user_id'=>(Crypt::encrypt(auth()->user()->id)),'subscription_id'=>(Crypt::encrypt($plan->id))])}}"> <button class="start-membership">Start membership</button></a>

            @if (Auth::check() && (isset(Auth::user()->email_verified_at) && !empty(Auth::user()->email_verified_at) ) && Auth::user()->is_sign_up_free == 0)
            <a href="{{url('signupfree')}}">Sign up for free</a>
            @endif
          </div>


          
        </div>
      </div>
    </div>
  </div>
  </div>
<?php //dd($access); ?>
<script>
   $("#flexSwitchCheckDefault").click(function(){
    $("#display").toggle();
    if($(this).text() == "Show"){
        $price = '<?php  echo isset($subscriptionPlanMonthly)? $subscriptionPlanMonthly->price : '0'; ?>';
        $('#plan-price').html('$'+$price+'.00');
       $(this).text("Hide");
    }else{
        $price = '<?php echo isset($subscriptionPlanAnually)? $subscriptionPlanAnually->price : '0'; ?>';
        $('#plan-price').html('$'+$price+'.00');
       $(this).text("Show");
    }
});

var access = "<?php echo isset($access)?$access:'false'; ?>";

  if(access == 'false')
  {
    // $('#exampleModal').modal();
    $('#exampleModal').modal({backdrop: 'static', keyboard: false}, 'show');
  }


$(document).ready(function(){
    var timer;
    var timeout = 2000; // Timout duration
    $('.text_area_value').keyup(function(){
      $('#save_notes').html("<span style='color:gray'> Saving... </span>")
        if(timer) {
            clearTimeout(timer);
        }
        timer = setTimeout(saveData, timeout); 
 
    });
 
    $('button#complete').click(function(){
        event.preventDefault();
        $('#iscomplete').val(1);
        saveData();
    });
});
function saveData(){
  var url = $(location).attr('href');
  var segments = url.split( '/' );
  console.log(segments);
  var lesson_id = $('#lesson_id').val();
  var course_id = $('#course_id').val();
  $.ajax({
    url:'<?= url('save_lesson_notes'); ?>'+'?lesson_id='+lesson_id+'&notes='+ $('.text_area_value').val()+'&course_id='+course_id+'&is_completed='+ $('#iscomplete').val(),
    method:'GET',
    success: function(result)
    {
      $('#save_notes').html("<span style='color:green'> Saved </span>");
      setTimeout(function(){
      $('#save_notes').html("");
      }, 3000);
    }

  })

}


    </script>

<script>
 function play(obj)
{
      console.log($(obj));
      var pause = '<?php echo url('images/pause.svg'); ?>';
      // alert(pause);
      $(obj).attr("src", pause);
   
      $(obj).addClass('pause');
      $(obj).attr('onClick','pause(this)');
      $(obj).removeClass('play');
      $("#videoId").attr('src',$(obj).attr("attr"));
      
      $("#videoId").trigger('play');

      // $('#play').attr("src", pause);
};
function pause(obj)
{
      console.log(obj);
      var play = '<?php echo url('images/Play button.svg'); ?>';
      // alert(pause);
      $(obj).attr("src", play);
   
      $(obj).addClass('play');
      $(obj).attr('onClick','play(this)')
      $(obj).removeClass('pause');
      $("#videoId").trigger('pause');
      ;

      // $('#play').attr("src", pause);
};
    </script>
@endsection('content')
