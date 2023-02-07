@extends('layouts.main')
@section('content')
<div class="col-12">
    @if (Session::has('error'))
    <div class="alert alert-error text-center">
        <p>{{ Session::get('error') }}</p>
    </div>
    @elseif(Session::has('success'))
    <div class="alert alert-success text-center">
        <p>{{ Session::get('success') }}</p>
    </div>

    @endif
</div>
<div class="container">
    <div class="name-home">
        <h1>Hi {{auth()->user()->first_name}},</h1>
    </div>
</div>

<!-- ===============   Practice Start   ============== -->
<div class="daily-goals">
    <div class="container">
        <div class="daily-goal">
            <div class="trophy">
                <img src="./images/trophy.png" alt="">
            </div>
            <div class="daily-progress">
                <h3>Daily Goals<span><img src="./images/edit.svg" alt="">Edit Goals</span></h3>
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
                         aria-valuemax="100"></div>
                </div>
                <small>04/10 xp</small>
            </div>
        </div>
    </div>
</div> 

<!-- ===============   Practice End   ============== -->
<!-- ===============   Chapter Start   ============== -->
<div class="chapter-detail" >
    <div class="container">
        <div class="chapter-detail-content"style="background-color: #1C1C1C; color: white;">
            <div class="chapter-header">
                <h6>Continue learning</h6> 
                <h1>{{$courses[0]->course_title}}</h1>
            </div>
            <div class="chapter-playlist">
                @if(isset($courses[0]->course_videos[0]) && !empty($courses[0]->course_videos))

                <div class="chapter-video">
                    <div class="webinar-image">
                        <?php
                        // dd($courses[0]->course_videos[0]->video_type);
                        $file_name = 'course/' . $courses[0]->id . '/' . $courses[0]->course_videos[0]->video_title . '.' . $courses[0]->course_videos[0]->video_type;
                        // dd($file_name,$courses[0]);
                        ?>
                        <video width="100%" height="100%" controls poster="{{url('images/')}}/Frame_29.png" preload="auto"><source src="{{ url($file_name)}}" type="video/mp4"></video>
                        {{-- <img src="./images/f1.png" alt="" style="width: 100%;"> --}}
                    </div>
                </div>
                @endif

                <div class="chapter-list" style="word-break: break-all; width: 68%;">
                    <div class="count"id="accordionExample">
                        <h5 class="accordion-header" id="headingOne">
                            {{$courses[0]->course_title}}
                        </h5>
                        <p>{{$courses[0]->overview}}
                        </p>

                        <div class="item">
                            <div class="play-list video-done">
                                <img src="./images/Play button.svg" alt="">
                                <span><a href="{{route('course-lesson',[$courses[0]->id])}}" >Continue learning</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- ===============   Chapter End   ============== -->
<div class="upcoming-webinar">
    <div class="container">
        <div class="webinar-inner">
            <h2 class="head-heding">Newly launched courses</h2>
            <div class="row">
                @foreach ($courses as $course)
                <?php
                $file_name = '';
                // dd($course->course_videos[0]->video_type);
                if (isset($course->course_videos[0]) && !empty($course->course_videos)) {
                    $file_name = 'course/' . $course->id . '/' . $course->course_videos[0]->video_title . '.' . $course->course_videos[0]->video_type;
                    // $file_name = 'course/'.$course->course_id.'/'.$course->video_title.'.'.$course->video_type;
                }
                ?>
                <div class="col-lg-4">
                    <div class="webinar-card">
                        <div class="webinar-heading">{{$course->course_title}}</div>
                        <div class="webinar-description">Susie Ashfield, Instructor</div>
                        <div class="webinar-image">
                            <video width="100%" height="100%" controls preload="auto"><source src="{{ url($file_name)}}" type="video/mp4"></video>
                        </div>
                        <div class="webinar-button">
                            <button><a href="{{route('course-lesson',[$courses[0]->id])}}" >Start learning</a></button>
                        </div>
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>




<div class="upcoming-webinar">
    <div class="container">

    </div>
    <div class="action oneee">
        <button type="button"data-bs-target="#exampleModal">
            Load more
        </button>
    </div>
</div>

<!-- ================   Modal   =============== -->



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="membership-plan-pop">
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
                    <a href="{{route('register')}}">Sign up for free</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection('content')

