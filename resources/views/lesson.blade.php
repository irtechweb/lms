@extends('layouts.main')
@section('content')

<?php 
$completion_per = ($totalquiz>0)?($completed_lesson_count/$totalquiz*100):0;
//dd("here");
?>
<style type="text/css">
input[type="checkbox"] {
  -webkit-appearance: none; /* Remove default checkbox styling on Safari/Chrome */
  -moz-appearance: none; /* Remove default checkbox styling on Firefox */
  appearance: none; /* Remove default checkbox styling */

  width: 16px; /* Set width of checkbox */
  height: 16px; /* Set height of checkbox */
  border-radius: 4px; /* Add rounded corners to checkbox */
  outline: none; /* Remove outline when checkbox is focused */
  background-color: white; /* Set background color of checkbox to white */
}

input[type="checkbox"]:checked::before {
  content: "\2713"; /* Add checkmark symbol */
  display: block; /* Display checkmark symbol */
  text-align: center; /* Center checkmark symbol */
  line-height: 16px; /* Set line height to match checkbox height */
  font-weight: 900; /* Make checkmark symbol even bolder */
  background: #1c1d1f;
  border-color: #1c1d1f;
  color: #fff;
  font-size: 12px;
}

  .completed i{
    color:black;
    /*background-color: yellow;*/
  }
  .cpf{
    
    font-family: 'Inter';
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 150%;
    color:#686868;
  }
.check-color{
    vertical-align: middle;
    border-style: none;
    background-color: #4bc750;
    width: 24px;
    height: 24px;
    border-radius: 50px;
    padding: 5px;
}
.hide{
  display:none;
}

.d-none {
  display: none !important;
}
</style>
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
          <p class="cpf">Chapter {{$sectioncount}}: {{ $sections[$sectioncount-1]->title}}</p>
          <h1>{{$course['course_title']}}</h1>
          {{-- <h6>{{$course['name']}}, Instructor</h6> --}}
        </div>
        <div class="chapter-playlist">
          <div class="chapter-video">
          <?php 
                if(isset($first_video))
                {
                    $file_name = $first_video->video_title."?rel=0&autoplay=0&controls=0&modestbranding=1&origin=https://academy.susieashfield.com/";
                ?>
            <?php                 
                }else{
                $file_name = $first_video->video_title."?rel=0&autoplay=0&controls=0&modestbranding=1&origin=https://academy.susieashfield.com/";
                }
                ?>
              <div  id="play_lesson" style="padding:58.00% 0 0 0;position:relative;border-radius: 12px;">
                <iframe id="videoId" src="{{url($file_name)}}" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen frameborder="0" 
                style="position:absolute;top:0;left:0;width:100%;height:100%;border-radius: 12px;">
                </iframe>
                <iframe id="videoId1" src="https://player.vimeo.com/video/798543316" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen frameborder="0" 
                style="position:absolute;top:0;left:0;width:100%;height:100%;border-radius: 12px;" class="d-none">
                </iframe>
              </div>
          </div>
          <div class="chapter-list" Style="min-height: 422px;">
            <div class="accordion" id="accordionExample">
           
            @foreach($sections as $section) 
            <?php 
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
                      $videopath =$video->video_title."?title=0&byline=0&portrait=0&speed=0&badge=0&autopause=0&share=0";
                   
                    $imgsrc = url('images/Play button.svg');
                    $completed = "";
                    $checked = "";
                    if((isset($lecturesnotes[$section->section_id][$lecturequiz->lecture_quiz_id]) && isset($lecturesnotes[$section->section_id][$lecturequiz->lecture_quiz_id]->completed) && $lecturesnotes[$section->section_id][$lecturequiz->lecture_quiz_id]->completed == 1 )){
                      $imgsrc = url('images/greentick.png');
                      $cl =  "done-video";
                      $checkbox = "checked";
                      $checked = "checked";
                      //$completed = "hide";
                    }
                    else if((isset($lecturesnotes[$section->section_id][$lecturequiz->lecture_quiz_id]) && isset($lecturesnotes[$section->section_id][$lecturequiz->lecture_quiz_id]->completed) && $lecturesnotes[$section->section_id][$lecturequiz->lecture_quiz_id]->completed == 0 )){
                      $cl =  "selected-video";
                    }
                    else{
                      $cl = "active-video"; 
                    } ?>
                    <!-- <a href="javascript:none;"> -->

                    <!-- <a href="{{route('course-lesson-number',[$course->id,$lecturequiz->lecture_quiz_id])}}"> -->

                    <div  class="play-list {{$cl}} main-div">
                     <img onclickevent="play(this)" course_id = "{{$course->id}}" lesson_id="{{$lecturequiz->lecture_quiz_id}}" id="play_btn" class="play" attr="{{$videopath}}" alt="" src="{{$imgsrc}}" >
                     <span>{!! $lecturequiz->title !!}<!-- <small style= "float:right"> 2:01 mins</small> --></span> 
                      <span class="pull-right completed {{$completed}}" id="mark_completed" course_id="{{$course->id}}"
                        lesson_id="{{$lecturequiz->lecture_quiz_id}}">
                        <div class="checkbox-container">
                          <input type="checkbox" id="myCheckbox" title="Mark as completed" {{$checked}}>
                          <label for="myCheckbox"></label>
                        </div>
                      </span>
                    </div>
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

<div class="chapter-tabs">
    <div class="container-main">
      <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
            type="button" role="tab" aria-controls="nav-home" aria-selected="true">Description</button>
          <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"
            role="tab" aria-controls="nav-profile" aria-selected="false">Notes</button>
        </div>
      </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade active show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

        <div id ="lessondesc"><p>
        
       </p></div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <span id="save_notes"> </span>
          <span id="save_notes"> </span>
          <form class="text_area">
             <input id="course_id" name="course_id" value="" type='hidden'>
            <input id="lesson_id" name="lesson_id" value="" type='hidden'>
            <textarea id="notes" style="overflow: auto;    resize: vertical;
                  border: none;
                  width: 100%;
                  background-color: #eeeeee;" class="text_area_value" rows="5" cols="33" placeholder="Write something" ></textarea>
           
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- ===============   Chapter End   ============== -->
  

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
<script src="https://player.vimeo.com/api/player.js"></script>
<script>
  var stopaction = false;
  var player = new Vimeo.Player(document.querySelector('iframe#videoId1'));

// playButton.addEventListener('click', function() {
//   player.play().then(function() {
//     console.log('Video played');
//   }).catch(function(error) {
//     console.log('Error playing the video');
//   });
// });
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
      var lesson_id = $('#lesson_id').val();
      
      if(lesson_id != ""){
      $('#save_notes').html("<span style='color:gray'> Saving... </span>")
        if(timer) {
            clearTimeout(timer);
        }
        timer = setTimeout(saveNotes, timeout); 
      }else{
        alert('Select any lesson first');
      }
 
    });

    $('div.main-div').on('click',function(){
      document.querySelector('iframe#videoId').classList.add('d-none');
      document.querySelector('iframe#videoId1').classList.remove('d-none');
      if(($(this).find('span#mark_completed').hasClass('in-progress')) == true ){
        return
      }
      if($(this).find('#play_btn').attr('class') == "play"){
        play($(this).find('#play_btn'),true)
      }else if($(this).find('#play_btn').attr('class') == "pause"){
        pause($(this).find('#play_btn'),true)
      }
    });

    $('span.completed').click(function(){
        stopaction = true;
        $('#lesson_id').val($(this).attr('lesson_id'));
        $('#course_id').val($(this).attr('course_id'));
        $(this).addClass('in-progress');
        //$(this).addClass('hide');
        const checkboxValue = $(this).find('input[type="checkbox"]').prop('checked');
        saveData($(this).attr('course_id'),$(this).attr('lesson_id'), checkboxValue ? 1 : 0)
    });
});
function saveData(course_id,lesson_id,completed=0){
  var url = $(location).attr('href');
  var segments = url.split( '/' );
  var lesson_id = $('#lesson_id').val();
  var course_id = $('#course_id').val();
  $.ajax({
    url:'<?= url('save_lesson_notes'); ?>'+'?lesson_id='+lesson_id+'&notes='+ $('.text_area_value').val()+'&course_id='+course_id+'&is_completed='+ completed,
    method:'GET',
    success: function(result)
    {
      obj = $('span.in-progress');
      obj.parent().removeClass('in-progress');
      obj.parent().addClass('done');
      
      obj.addClass('done');
      
      obj.removeClass('completed');
      obj.removeClass('in-progress');
      obj.parent().find('img').removeAttr('src');
      if(completed == 1)
        obj.parent().find('img').attr('src','<?php echo url('images/greentick.png'); ?>');
      else
        obj.parent().find('img').attr('src','<?php echo url('images/Play button.svg'); ?>');
      obj.parent().find('img').addClass('play');
      obj.parent().find('img').attr('onclickevent','play(this)')
      obj.parent().find('img').removeClass('pause');
      //obj.parent().find('span#mark_completed').addClass('hide');
    }

  })

}

function saveNotes(){
  var url = $(location).attr('href');
  var segments = url.split( '/' );
  var lesson_id = $('#lesson_id').val();
  var course_id = $('#course_id').val();
  $.ajax({
    url:'<?= url('save_lesson_notes'); ?>'+'?lesson_id='+lesson_id+'&notes='+ $('.text_area_value').val()+'&course_id='+course_id,
    method:'GET',
    success: function(result)
    { 
      $('#save_notes').html("<span style='color:gray'> Saved </span>")
    }

  })

}
function getLessonDetail(course_id,lesson_id){
  var url = $(location).attr('href');
  $('input#course_id').val(course_id);
  $('input#lesson_id').val(lesson_id);
  $('#save_notes').html('');
  // empty notes and desc
  $('#lessondesc p').html('');
  $('textarea#notes').val('');
  $('textarea#notes').attr('disabled', true);
  $.ajax({
    url:'<?= url('course-lesson-detail'); ?>'+'/'+course_id+'/'+lesson_id,
    method:'GET',
    success: function(result)
    {
      obj = $('span.in-progress');
      obj.addClass('done');
      obj.removeClass('completed');
      obj.removeClass('in-progress');
      $('#lessondesc p').html(result.desc);
      if(result.completed == 0){
        $('textarea#notes').attr('disabled', false);
      }
      else
        $('textarea#notes').attr('disabled', false);

      $('textarea#notes').val(result.notes);
    }

  })

}
</script>
<script>
function play(obj,from_play=false)
{
  $('div.play-list img.pause').each(function() {
        document.querySelector('iframe#videoId').classList.add('d-none');
        document.querySelector('iframe#videoId1').classList.remove('d-none');
        $(this).addClass("play");
        $(this).removeClass("pause");
        $(this).attr('src','<?php echo url('images/Play button.svg'); ?>');
      });

      var course_id =  $(obj).attr("course_id");
      var lesson_id =  $(obj).attr("lesson_id");
      var pause = '<?php echo url('images/pause.svg'); ?>';
      var video_url = $(obj).attr("attr");
      
      $(obj).removeAttr("src");
      $(obj).attr("src", pause);
      $(obj).addClass('pause');
      $(obj).parent().addClass('in-progress');
      $(obj).attr('onclickevent','pause(this)');
      $(obj).removeClass('play');
      
      // delete the localStorage value for the previous video, if it exists
      const prevCourseId = localStorage.getItem('currentCourseId');
      const prevLessonId = localStorage.getItem('currentLessonId');
      
      // set the current course_id and lesson_id in localStorage
      localStorage.setItem('currentCourseId', course_id);
      localStorage.setItem('currentLessonId', lesson_id);
     
      // verify that the value has been set correctly
      if((prevCourseId == course_id) && (prevLessonId != lesson_id)) {
        localStorage.removeItem('currentTime_' + prevCourseId + '_' + prevLessonId);
      }

      const currentTimeKey = "currentTime_" + course_id + "_" + lesson_id;
      const storedTime = localStorage.getItem(currentTimeKey);

      if (!isNaN(storedTime)) {
         player.currentTime = storedTime;
      }
      // in case of new lesson load video  else play from last pause
      if(storedTime <= 0 || isNaN(storedTime)){
        getLessonDetail(course_id,lesson_id);
        player.loadVideo(video_url).then(function() {
        player.play();
        });
      }
      else{
        player.play();
      }
     
      $('#lessondesc p').html();
      $('span#save_notes textarea').val();
      $(obj).parent().find('span#mark_completed').removeClass('hide');
};

async function pause(obj,from_play=false)
{
      var course_id =  $(obj).attr("course_id");
      var lesson_id =  $(obj).attr("lesson_id");
      var play = '<?php echo url('images/Play button.svg'); ?>';
      $(obj).attr("src", play);
      $(obj).addClass('play');
      $(obj).removeClass('pause');
      player.pause();
      const currentTime = await getCurrentTime();

      // save current playback position to localStorage
      const currentTimeKey = "currentTime_" + course_id + "_" + lesson_id;
      localStorage.setItem(currentTimeKey, currentTime);
};

function getCurrentTime() {
  return player.getCurrentTime()
    .then(function(time) {
      return time;
    })
    .catch(function(error) {
      console.log('Failed to get current time');
    });
}
// clear local storage video current time
window.onbeforeunload = function() {
   localStorage.clear();
};
</script>
@endsection
