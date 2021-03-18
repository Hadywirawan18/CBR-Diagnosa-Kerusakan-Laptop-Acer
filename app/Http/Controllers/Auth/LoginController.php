<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

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
        $this->middleware('guest')->except('logout');
    }

    // public function username()
    // {
    //     $identity  = request()->get('identity');
    //     $fieldName = 'username';
    //     request()->merge([$fieldName => $identity]);
    //     return $fieldName;
    // }

    // protected function validateLogin(Request $request)
    // {
    //     $this->validate(
    //         $request,
    //         [
    //             'identity' => 'required|string',
    //             'password' => 'required|string',
    //         ],
    //         [
    //             'identity.required' => 'Username or email is required',
    //             'password.required' => 'Password is required',
    //         ]
    //     );
    // }

    // protected function sendFailedLoginResponse(Request $request)
    // {
    //     throw ValidationException::withMessages([
    //         'identity' => [trans('auth.failed')],
    //     ]);
    // }

    public function login(Request $request)
    {
        $this->validate($request, [
            "username" => "required",
            "password" => "required"
        ]);

        $username = $request->get("username");
        $password = $request->get("password");

        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            if (Auth::user()->role == "admin") {
                return redirect()->route("dashboard");
            } else {
                return redirect()->route("home");
            }
        } else {
            return redirect()->route("login")->with("error", "username / password salah");
        }
    }
}
