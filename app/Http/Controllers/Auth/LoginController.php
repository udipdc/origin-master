<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\User;
use Hash;

class LoginController extends Controller
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
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout','adminLogout','showAdminLoginForm','adminLogin']);
        $this->middleware('guest:admin')->except(['showLoginForm','login','logout','adminLogout']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password,'status' => 1], $request->get('remember'))) {

            $userData = User::select('id','firstname','lastname','email','username','is_default_password')->where('username', $request->username)->first();
            if($userData->is_default_password=="0")
            {
                //dd("user is_default_password 0");
                session()->flash('success', 'You Are Loggedin Sucessfully!');
                return redirect()->route('nurse.changePassword');
            }
            else
            {
                //dd("user is_default_password 1");
                session()->flash('success', 'You Are Loggedin Sucessfully!');
                return redirect()->route('nurse.dashboard');
            }
        }
        else {
            session()->flash('error', 'You have entered wrong credentials!!');
            return redirect()->route('login');
        }
        session()->flash('error', 'You have entered wrong credentials!!');
        return back()->withInput($request->only('username', 'remember'));
    }

    public function showAdminLoginForm()
    {
        
        return view('admin.auth.login');
    }
   
    public function adminLogin(Request $request)
    {

        $this->validate($request, [
            'username'   => 'required',
            'password' => 'required|min:8'
        ]);

        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password,'status' => 1], $request->get('remember'))) {

            session()->flash('success', 'You Are Loggedin Sucessfully!');
            return redirect()->intended('admin/dashboard');
        } 
        session()->flash('error', 'You have entered wrong credentials!!');
        return back()->withInput($request->only('username', 'remember'));
    }

    public function logout(Request $request) {
        // Get the session key for this user
        $sessionKey = Auth::guard('web')->getName();

        // Logout current user by guard
        Auth::guard('web')->logout();

        // Delete single session key (just for this user)
        $request->session()->forget($sessionKey);
        // After logout, redirect to login screen again
        return redirect()->route('login');
    }

    public function adminLogout(Request $request) {
        // Get the session key for this user
        $sessionKey = Auth::guard('admin')->getName();

        // Logout current user by guard
        Auth::guard('admin')->logout();

        // Delete single session key (just for this user)
        $request->session()->forget($sessionKey);

        // After logout, redirect to login screen again
        return redirect()->route('admin.login');
    }
}
