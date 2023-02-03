<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebinarController extends Controller {

    public function getWebinars() {
        $data['recorded'] = \App\Models\Webinar::getWebinarsAgainstType('type', 'recorded');
        $data['upcoming'] = \App\Models\Webinar::getWebinarsAgainstType('type', 'upcoming');
        return view('webinars', compact('data'));
    }

}
