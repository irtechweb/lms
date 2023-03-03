@extends('layouts.main')
@section('content')
<!-- ===============   Webinar Start   ============== -->
<div class="upcoming-webinar">
<div class="container">
   <div class="webinar-inner">
      <h2 class="head-heding">Upcoming webinars</h2>
      <div class="webinar-cards">
         @foreach($data['upcoming'] as $key=>$record)
         <?php 
            $action = $record['video_url'];
            $style = "";
            $btn_label = "Book a slot";
            $btnDisabled = ''; ?>
         <div class="webinar-card">
            <div class="date">{{$record['date']}}</div>
            <div class="webinar-heading">{{$record['title']}}</div>
            <div class="webinar-image">
               @if(!empty($record['video_url']))
               <img src="{{ asset('assets/img/'.$record['image']) }}">
               @else
               <img src="{{url('images/f1.png')}}" alt="">
               @endif
            </div>
            <div class="webinar-button">
               <a href="{{$action}}" target="__blank" >
               <button {{ $btnDisabled }} id="postwebinar" style= <?= $style ?> >{{$btn_label}}</button></a>
            </div>
         </div>
         @endforeach
      </div>      
   </div>
</div>
<!-- ===============   Webinar End   ============== -->
<!-- ===============   Webinar Start   ============== -->
<div class="upcoming-webinar">
<div class="container">
   <div class="webinar-inner">
      <h2 class="head-heding">Previous Webinars</h2>
      <div class="webinar-cards">
         @foreach($data['recorded'] as $key=>$record)
         <div class="webinar-card">
            <div class="date">{{$record['date']}}</div>
            <div class="webinar-heading">{{$record['title']}}</div>
            <div class="webinar-description">{{$record['instructor']}}, Instructor</div>
            <div class="webinar-image">
               @if(!empty($record['video_url']))
               <iframe style="height: inherit;width: inherit" src="{{$record['video_url']}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
               @else
               <img src="{{url('images/f1.png')}}" alt="">
               @endif
            </div>
            
         </div>
         @endforeach
      </div>
   </div>
</div>
@endsection