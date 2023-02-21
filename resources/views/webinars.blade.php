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
                //dd($record); 
                $action = url('book-webinar');
                $style = "";
                $btn_label = "Book a slot";
                $btnDisabled = '';
                if(in_array($record['id'],$data['userbooked'])){
                  $action = "javascript:;";
                  $style = "background-color:green;color:white";
                  $btn_label = "Booked";
                    $btnDisabled = 'disabled';
            } ?>
            <form action="{{$action}}" method="post">
                @csrf
            <input type="hidden" name="web_id" value="{{$record['id']}}">

            <div class="webinar-card">
                <div class="date">{{$record['date']}}</div>
                <div class="webinar-heading">{{$record['title']}}</div>
                <!-- <div class="webinar-description">{{$record['instructor']}}, Instructor</div> -->
                <div class="webinar-image">
                  
                    @if(!empty($record['video_url']))

                    <!-- <iframe style="max-height: 220px;max-width: 310px" src="{{$record['video_url']}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> -->

                    <img style="max-height: 220px;max-width: 310px" src="{{ asset('assets/img/'.$record['image']) }}">
                    @else
                    <img src="{{url('images/f1.png')}}" alt="">
                    @endif
                </div>
                <div class="webinar-button">
                    
                    <button {{ $btnDisabled }} id="postwebinar" style= <?= $style ?> >{{$btn_label}}</button>
                    
                </div>
            </div>
        </form>
            @endforeach

        </div>
    </form>
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
                    @if(!empty($record['image']))
                    <iframe style="max-height: 220px;max-width: 310px" src="{{$record['video_url']}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

                    @else
                    <img src="{{url('images/f1.png')}}" alt="">
                    @endif
                </div>
                <!-- <div class="webinar-button">
                    <button>Book a slot</button>
                </div> -->
            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- ===============   Webinar End   ============== -->
<!-- <script type="text/javascript">
    
    $('button#postwebinar').on('click',function(){
        $('div.loaderImage').show();

    })
</script>> -->

@endsection