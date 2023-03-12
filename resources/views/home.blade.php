@extends('layouts.main')
@section('content')

@php
    $setting = \App\Models\Setting::first();
@endphp

<style>
    .login {
        color: #3f3f3f;
        text-decoration: none;
    }
    .login:hover {
        background: #1c1c1c;
        border: 1px solid #1c1c1c;
        color: #FFFFC8 !important;
        transition: 0.4s;
        text-decoration: none;
    }

    .video-overlay {
        position: relative;
    }

    .video-overlay::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
    }
</style>

<!-- <div class="col-12">
    @if (Session::has('error'))
    <div class="alert alert-error text-center">
        <p>{{ Session::get('error') }}</p>
    </div>
    @elseif(Session::has('success'))
    <div class="alert alert-success text-center">
        <p>{{ Session::get('success') }}</p>
    </div>

    @endif
</div> -->
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
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <small>04/10 xp</small>
            </div>
        </div>
    </div>
</div>

<!-- ===============   Practice End   ============== -->
<!-- ===============   Chapter Start   ============== -->
@if(count($allCourses) > 0)
    <div class="chapter-detail">
        <!-- <div class="container">
            <div class="chapter-detail-content"style="background-color: #1C1C1C; color: white;">
                <div class="chapter-header">
                    <h6>Continue learning</h6> 
                    <h1>{{$allCourses[0]->course_title}}</h1>
                </div>
                <div class="chapter-playlist">
                    @if(isset($allCourses[0]->course_videos[0]) && !empty($allCourses[0]->course_videos))

                    <div class="chapter-video">
                        <div class="webinar-image">
                            <?php
                            // dd($allCourses[0]->course_videos[0]->video_type);
                            $file_name = 'course/' . $allCourses[0]->id . '/' . $allCourses[0]->course_videos[0]->video_title . '.' . $allCourses[0]->course_videos[0]->video_type;
                            // dd($file_name,$allCourses[0]);
                            ?>
                            <video width="100%" height="100%" controls poster="{{url('images/')}}/Frame_29.png" preload="auto"><source src="{{ url($file_name)}}" type="video/mp4"></video>
                            {{-- <img src="./images/f1.png" alt="" style="width: 100%;"> --}}
                        </div>
                    </div>
                    @endif

                    <div class="chapter-list" style="word-break: break-all; width: 68%;">
                        <div class="count"id="accordionExample">
                            <h5 class="accordion-header" id="headingOne">
                                {{$allCourses[0]->course_title}}
                            </h5>
                            <p>{{$allCourses[0]->overview}}
                            </p>

                            <div class="item">
                                <div class="play-list video-done">
                                    <img src="./images/Play button.svg" alt="">
                                    <span><a href="{{route('course-lesson',[$allCourses[0]->id])}}" >Continue learning</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <!-- </div> -->
    <!-- ===============   Chapter End   ============== -->
    <div class="upcoming-webinar">
        <div class="container">
            <div class="webinar-inner">
                <h2 class="head-heding">Courses List</h2>
                <div class="row">
                    @php $i =1; $uPlan = \Auth::user()->userSubscribedPlans()->get()->count();@endphp
                    @foreach ($allCourses->take(6) as $course)
                        @php
                            $file_name = 'https://player.vimeo.com/video/800186201?title=0&byline=0&portrait=0&speed=0&badge=0&autopause=0&share=0';
                            if(isset($course->course_videos[0]) && !empty($course->course_videos)) {
                                //$file_name = 'course/' . $course->id . '/' . $course->course_videos[0]->video_title . '.' . $course->course_videos[0]->video_type;
                                $file_name = $course->course_videos[0]->video_title."?title=0&byline=0&portrait=0&speed=0&badge=0&autopause=0&share=0";
                                // $file_name = 'course/'.$course->course_id.'/'.$course->video_title.'.'.$course->video_type;
                            }
                        @endphp
                        @if($i > 3 && $i % 3 == 1)
                            </div>
                            <div class="row" style="padding-top:20px;">
                        @endif
                        <div class="col-lg-4">
                            <div class="course-card">
                                <div class="webinar-heading">{{$course->course_title}}</div>
                                <div class="webinar-description">Susie Ashfield, Instructor</div>
                                <div class="webinar-image @if($loop->iteration > $lockedCount || !$uPlan) video-overlay @endif">
                                    <div id="play_lesson" style="padding:58.00% 0 0 0;position:relative;width:100%;height:100%;">
                                        <iframe id="videoId" src="{{url($file_name)}}" allow=" autoplay; fullscreen; picture-in-picture" allowfullscreen frameborder="0" style="position:absolute;top:0;left:0;width:inherit;height:inherit;"></iframe>
                                    </div>
                                    {{-- <video width="100%" height="100%" controls preload="auto">
                                        <source src="{{ url($file_name)}}" type="video/mp4">
                                    </video> --}}
                                </div>
                                <div class="webinar-button">
                                    <a href="{{ !$uPlan ? url('membership-plans') : ($loop->iteration > $lockedCount ? 'javascript:void(0)' : route('course-lesson',[$course->id])) }}" style="text-decoration: none;">
                                        <button>@if($loop->iteration > $lockedCount || !$uPlan) <i class="fa fa-lock" aria-hidden="true"></i>@endif Start learning</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @php $i++; @endphp
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif

@if(count($allCourses) > 6)
    <div class="upcoming-webinar">
        <div class="container"></div>
        <div class="action oneee" style="@if(request()->route()->uri() == 'home') margin-top: 0px; @endif">
            <a type="button" class="login all-courses-btn" href="{{ route('view.all.courses') }}">All Courses</a>
        </div>
    </div>
@endif

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