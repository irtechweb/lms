@extends('layouts.main')
@section('content')


<!-- Calendly inline widget begin -->
<!-- <div class="col-md-4">
    <a href="#" type="button">Available Booking Count : {{$count}}</a>

</div> -->

<!-- <div class="hero"> -->
    <div class="container">
        <div class="row mt-5 mb-5">
            <div class="col-md-6">
                <h2>Schedule 1:1 meeting with coach</h2>
                <h6 style="font-family: Inter;
font-size: 16px;
font-weight: 500;
line-height: 24px;
letter-spacing: 0em;
text-align: left;
">You can Schedule 60 mins 1:1 meeting with a coach as per <u>your plan</u> selected
                with the given calendy below</h6>
                <!-- <span class="header1">Schedule 1:1 meeting with coach</br></span>   -->

                <!-- <span class="header2">You can Schedule 20 mins 1:1 meeting with a coach as per your plan selected
                with the given calendy below</br></span>  -->
                
            </div>

            <div class="col-md-6">
                <h4 class="float-right">Booking credits for this month: {{$count}}</h4>
                <!-- <span class="header2"></br></span>   -->

                
                
            </div>
        </div>
    </div>
<!-- </div> -->
<meta name="csrf-token" content="{{ csrf_token() }}">
@if($count>0)
<div class="calendly-inline-widget" data-url="https://calendly.com/susie-speak2impact-/60min" style="min-width:320px;height:630px;">
    
</div>
@else
<!-- <div class="hero">
    <div class="container">
        <div class="hero-top">
            
            <div class="col-md-12 hero-heading">
                <h1>Buy More Bookings</br></h1>  
                <button class="btn btn-bg-gradient-x-blue-cyan" type="button">
                    <a href="{{route('bookSlot')}}">Buy Bookings </a>
                </button>
            </div>
        </div>
    </div>
</div> -->

<!-- <div class="modal show" tabindex="-1" role="dialog" id="exampleModal" > -->
<div class="modal-dialog show mb-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> 
    <form action="{{route('bookSlot')}}" >
    <!-- <div class="modal-dialog"> -->
        <div class="modal-content">
            <div class="modal-body">
                <div class="membership-plan-pop">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <p class="text-center" style="color :white; line-height :48px; font-family: Space Grotesk;
font-size: 32px;
font-weight: 500;
line-height: 48px;
letter-spacing: 0em;
text-align: center;
">Add more booking </br>credits</p>
                    <!-- <div class="toggle-membership">
                       Add More Booking credits?
                    </div> -->
                    
                    <h6><span>£<?= $price ?> for each 60 min minutes</span></h6>
                    <button class="start-membership">Buy more booking slots</button>
                    
                </div>
            </div>
        </div>
    <!-- </div> -->
</form>
</div>
@endif
<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

<script>

    //$('#exampleModal').modal({backdrop: 'static', keyboard: false}, 'show');
    // var available_count = <?php echo $count ?>;
    // alert(available_count);
     //if(available_count == 0){
        
       // $('#exampleModal').modal();
        //$('#exampleModal').modal({backdrop: 'static', keyboard: false}, 'show');
    //}


function isCalendlyEvent(e) {
    return e.origin === "https://calendly.com" && e.data.event && e.data.event.indexOf("calendly.") === 0;
}
;

window.addEventListener("message", function (e) {
    if (isCalendlyEvent(e)) {
        /* name of the event */
        console.log("Event name:", e.data.event);

        /* payload of the event */
        console.log("Event details:", e.data.payload);
        console.log("Event URL:", e.data.payload.event.uri);
//        console.log("Event Invitee:", e.data.payload.invitee.uri);
        var event_url = e.data.payload.event.uri;
        var invitee_url = e.data.payload.invitee.uri;

        scheduleEventFunction(event_url, invitee_url);

    }
});

function scheduleEventFunction(event_url, invitee_url) {
    var routeUrl = '<?php echo route("createBooking") ?>';
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        data: {event_url: event_url, invitee_url: invitee_url},
        url: routeUrl,
        success: function (data) {
            if (data.success) {
                Swal.fire('Booking Created Successfully');
                setTimeout(function(){
                   window.location.reload();
                }, 5000);
            } else {
                Swal.fire('Error occurred while saving booking data');
            }
        },
        error: function () {
//            console.log('flow is here in error case');
            Swal.fire('something went wrong while saving this booking');
        }
    });
}

</script>

<!-- Calendly inline widget end -->
@endsection('content')