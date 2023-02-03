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
    Role
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

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request) {
        Auth::guard('web')->logout();

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
            return redirect()->route('home');
        } else {
            $user = User::create([
                        'first_name' => $data['first_name'],
                        'email' => $data['email'],
                        $data['is_active'] => '1',
                        'email_verified_at' => date('Y-m-d H:i:s')
            ]);

            // $a=$user->roles()
            //    ->attach(Role::where('name', 'student')->first());
            //    dd($a,$user );
            // User::insert($data);
            Auth::login($user);
            return redirect()->route('home');
            return view('auth.studentregister', ['name' => $userSocial->getName(), 'email' => $userSocial->getEmail()]);
        }
    }

}
