<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Setting;
use Validator;

class HomeController extends Controller
{
    public function index()
    {
        // dd(auth()->user());
        $data['students'] =  User::where('is_active','1')->count();
        return view('admin.index',compact('data'));
    }

    public function profile()
    {
        return view('admin.profile');
    }
    public function showSiteContent(Request $request){

        return view('admin.sitecontent');
    }
    public function setting(Request $request){
        $setting = Setting::first();
        return view('admin.setting',compact('setting'));
    }
    
    public function saveSetting(Request $request){

         $input = $request->only('free_sign_up','contact_email','instagram','facebook',
             'tiktok','linkedin','promo_video_link');
        

        $validation_rules = ['free_sign_up' => 'required|string|max:255',
        'free_sign_up' => 'required|string',
        'contact_email' => 'required|email|max:255',
        'instagram' => 'required|string|max:255',
        'facebook' => 'required|string|max:255',
        'tiktok' => 'required|string|max:255',
        'linkedin' => 'required|string|max:255',

        ];

        $validator = Validator::make($request->all(), $validation_rules);

        // Stop if validation fails
        if ($validator->fails()) {
            return $this->return_output('error', 'error', $validator, 'back', '422');
        }

        $current_setting = Setting::first();
        if($current_setting == NULL)
            $setting = Setting::create($input);
        else
            $setting = Setting::where('id',$current_setting->id)->update($input);
        if ($setting) {
            return redirect()->route('setting')->with('success','Setting Saved Successfully!');
        } else {
            return redirect()->back()->with('error','Error occurred! please try again');
        }

        
    }
}
