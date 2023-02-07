<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
    //   dd(auth()->user());
    	$data = \App\Models\Subscription::getSubscriptions();
    	//dd($data);
        if(Auth::check() && (isset(Auth::user()->email_verified_at) && !empty(Auth::user()->is_sign_up_free) ))
            return redirect('home');
        return view('landing', compact('data'));
    }

    public function profile()
    {
        return view('profile');
    }
}
