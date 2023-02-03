<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller {

    public function bookSlot() {
        return view('book-slot');
    }

    public function createBooking(Request $request) {
        $inputs = $request->toArray();
        $prepareBooking = [];
//        $uri = $inputs['invitee_url'];
        $urlArray = (explode("/", $inputs['invitee_url']));
        $firstKey = array_search('scheduled_events', $urlArray);
        $secondKey = array_search('invitees', $urlArray);
        $data = [
            'event_uuid' => $urlArray[$firstKey + 1],
            'invitee_uuid' => $urlArray[$secondKey + 1],
            'booking_uri' => $inputs['invitee_url'],
//            'user_id' => 4,
            'user_id' => Auth::user()->id,
        ];

//        $eventUuid = $urlArray[$firstKey + 1];
//        $inviteeUuid = $urlArray[$secondKey + 1];
        // get calendaly event
        if (!empty($data['event_uuid'])) {
            $getCalendalyData = self::getCalendalyData($data);
            $prepareBooking = self::prepareCheckCalendalyData($getCalendalyData, $data);
        }
        if (!empty($prepareBooking)) {
            //save Booking
            $save = \App\Models\EventBooking::saveBooking($prepareBooking);
            $updateCount = \App\Models\AvailableBookingCount::decrementCount($prepareBooking['user_id']);
            if (empty($save)) {
                return ['success' => false, 'message' => 'Error occurred while saving booking data'];
            }
        }

        return ['success' => true];
    }

    public static function getCalendalyData($data = []) {
        $ch = curl_init();
        $url = 'https://api.calendly.com/scheduled_events/' . $data['event_uuid'];
        $token = config('paths.calendaly_token');
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        $headers = array();
        $headers[] = 'Authorization: Bearer ' . $token;
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Cookie: __cf_bm=_bc1mQ4n_2RjPvK6586zGI9gWrylYgFbvHnFtOvdH0Q-1674992760-0-AeTEMYkwO6TeCKOe0v0K8gKvjaqTXL29Yv92X4y/Ic1fayMs8usFCt1sC1cU9vquMQYcotJZ9pifXSb8h7CMg1A=';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
            return ['success' => false, 'data' => curl_error($ch)];
        }
        curl_close($ch);
        return json_decode($result);
    }

    public static function prepareCheckCalendalyData($data = [], $requestData = []) {
        $booking = [];
        if (!empty($data->resource)) {
//            $booking['start_time'] = isset($data->resource->start_time) ? $data->resource->start_time : null;
//            $booking['end_time'] = isset($data->resource->end_time) ? $data->resource->end_time : null;
            $booking['start_time'] = isset($data->resource->start_time) ? date('Y-m-d H:i:s', strtotime($data->resource->start_time)) : null;
            $booking['end_time'] = isset($data->resource->end_time) ? date('Y-m-d H:i:s', strtotime($data->resource->end_time)) : null;
            $booking['name'] = isset($data->resource->name) ? $data->resource->name : null;
            $booking['status'] = isset($data->resource->status) ? $data->resource->status : null;
        }
        if (!empty($requestData)) {
            $booking['booking_uri'] = isset($requestData['booking_uri']) ? $requestData['booking_uri'] : null;
            $booking['event_uuid'] = isset($requestData['event_uuid']) ? $requestData['event_uuid'] : null;
            $booking['invitee_uuid'] = isset($requestData['invitee_uuid']) ? $requestData['invitee_uuid'] : null;
            $booking['user_id'] = isset($requestData['user_id']) ? $requestData['user_id'] : null;
        }
        return $booking;
    }

}
