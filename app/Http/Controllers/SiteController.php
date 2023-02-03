<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
    //   dd(auth()->user());
        return view('landing');
    }

    public function profile()
    {
        return view('profile');
    }
}
