<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\Models\{
    User,
    Role,
    UserLoginLog
};

class AuthenticatedSessionController extends Controller {

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request) {
        $request->authenticate();

        $request->session()->regenerate();
        User::where('id',Auth::guard('web')->user()->id)->update(['last_login_at'=>date('Y-m-d H:i:s')]);
        $user = User::where('id',Auth::guard('web')->user()->id)->select('id as user_id','last_login_at','last_logout_at')->first()->toArray();
        //dd($user);
        UserLoginLog::saveData($user);
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request) {
        $user = User::where('id',Auth::guard('web')->user()->id);
        $user_id = Auth::guard('web')->user()->id;
        Auth::guard('web')->logout();
        if($user != NULL){
            $user->update(['last_logout_at'=>date('Y-m-d H:i:s')]);
            $user = User::where('id',$user_id)->select('id as user_id','last_login_at','last_logout_at')->first()->toArray();
            UserLoginLog::saveData($user);

        }
       

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function socialLogin($social) {
        return Socialite::driver($social)->redirect();
    }

    /**
     * Obtain the user information from Social Logged in.
     * @param $social
     * @return Response
     */
    public function handleProviderCallback($social) {
        // dd(Socialite::driver($social)->user()->name,'firstname'=>); 
        $userSocial = Socialite::driver($social)->user();
        // dd($user->email);
        $data['email'] = $userSocial->email;
        $data['first_name'] = $userSocial->name;
        $data['is_active'] = '1';

        $user = User::where(['email' => $userSocial->getEmail()])->first();

        if ($user) {

            Auth::login($user);
            //----------logging logins
            $user = User::where('id',$user->id)->select('id as user_id','last_login_at','last_logout_at')->first()->toArray();
            UserLoginLog::saveData($user);
            //------------------------
             return redirect(RouteServiceProvider::HOME);
            //return redirect()->route('home');
        } else {
            $user = User::create([
                        'first_name' => $data['first_name'],
                        'email' => $data['email'],
                        'is_active' => $data['is_active'],
                        'email_verified_at' => date('Y-m-d H:i:s')
            ]);

            // $a=$user->roles()
            //    ->attach(Role::where('name', 'student')->first());
            //    dd($a,$user );
            // User::insert($data);
            Auth::login($user);
            //----------logging logins
            $user = User::where('id',$user->id)->select('id as user_id','last_login_at','last_logout_at')->first()->toArray();
            UserLoginLog::saveData($user);
            //------------------------
            return redirect(RouteServiceProvider::HOME);
        }
    }

    public function signUpFree() {

        
        \DB::table('users')
            ->where('id', Auth::user()->id)
            ->update(['is_sign_up_free'=>1]);
        return redirect('/home');
        
    }

}
