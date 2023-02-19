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
    
    public function subsOrder(Request $request) {
        $paginate_count = 10;
        
        
        $plan = \DB::table('user_subscribed_plans')->join('users','user_subscribed_plans.user_id','users.id')                
                ->leftJoin('subscriptions', 'subscriptions.id',  'user_subscribed_plans.subscription_id')
                ->select('user_subscribed_plans.*', 'users.first_name', 'users.last_name','subscriptions.plans')->orderby('user_subscribed_plans.id','desc')
                ->paginate($paginate_count);
       
        
        return view('admin.subscriptionorders', compact('plan'));
    }
    public function coachOrder(Request $request) {
        $paginate_count = 10;
        
        
        $coach = \DB::table('user_bought_coaching')->join('users','user_bought_coaching.user_id','users.id')                
                
                ->select('user_bought_coaching.*', 'users.first_name', 'users.last_name')->orderby('user_bought_coaching.id','desc')
                ->paginate($paginate_count);
       
        
        return view('admin.coachorders', compact('coach'));
    }
    public function courseAcess(Request $request) {
        $paginate_count = 10;
        
        
        $access = \DB::table('free_user_course_access')->join('users','free_user_course_access.user_id','users.id')                
                ->join('courses','courses.id','free_user_course_access.course_id')
                ->select('courses.course_title', 'users.first_name', 'users.last_name','free_user_course_access.*')->orderby('free_user_course_access.id','desc')
                ->paginate($paginate_count);
       
        
        return view('admin.access', compact('access'));
    }
    

    
}
