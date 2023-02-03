@extends('layouts.main')
@section('content')
<!-- Calendly inline widget begin -->
<div class="col-md-4">
    <a href="#" type="button">Available Booking Count : {{$count}}</a>

</div>
<meta name="csrf-token" content="{{ csrf_token() }}">
@if($count>0)
<div class="calendly-inline-widget" data-url="https://calendly.com/susie-speak2impact-/60min" style="min-width:320px;height:630px;"></div>
@else
<div class="hero">
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
</div>
@endif
<script type="text/javascript" src="https://assets.calendly.com/assets/external/widget.js" async></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

<script>

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