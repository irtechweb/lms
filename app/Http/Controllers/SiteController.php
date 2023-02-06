<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
    //   dd(auth()->user());
    	$data = \App\Models\Subscription::getSubscriptions();
    	//dd($data);
        return view('landing', compact('data'));
    }

    public function profile()
    {
        return view('profile');
    }
}
