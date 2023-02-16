<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index()
    {
    	$data = \App\Models\Subscription::getSubscriptions();    	
        if(Auth::check() && (isset(Auth::user()->email_verified_at)  ))
                return redirect('home');

        return view('landing', compact('data'));
    }

    public function home()
    {
        $data = \App\Models\Subscription::getSubscriptions();       
        if(Auth::check() && (isset(Auth::user()->email_verified_at) && !empty(Auth::user()->is_sign_up_free) ))
            return redirect('home');

        return view('landing', compact('data'));
    }

    public function profile()
    {
        return view('profile');
    }

    public function profileImage(Request $request)
    {
        $this->validate(
            $request,
            [
                'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            ],
            [
                'image.mimes' => 'The image must be file of type jpeg,png,jpg,gif,svg',
                'image.max'   => 'The image size can not be greater than 500kb',
                'image.dimensions' => 'The image dimensions consists on 1000*1000'
            ]
        );
        $image = $request->file('image');
        $name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/profile_images');
        $image->move($destinationPath, $name);
        echo json_encode(['success' => true, 'payload' => url('profile_images/' . $name)]);
    }
}
