<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * For Loading Admin Login Page
     *
     * @return \Illuminate\Http\Response
     */
    public function showLogin()
    {
        return view('admin.auth.login');
    }
    /**
     * Admin Login Authentication Function
     *
     * @param \Illuminate\Http\Request $request
     * @return  \Illuminate\Http\Responce
     */
    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $this->credentials($request);
        $remember = $request->rememberPassword;
        if($remember=='on'){
            if (Auth::guard('admin')->attempt($credentials,$remember)) {
                $request->session()->regenerate();
                return redirect()->intended('admin');
            }
        }else if(Auth::guard('admin')->attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('admin');
        }


        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ]);
    }


    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('admin.login'));
    }
}
