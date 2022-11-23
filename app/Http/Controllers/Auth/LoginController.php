<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
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

    use AuthenticatesUsers, ThrottlesLogins;

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

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $request->validate([
            'username' => 'bail|required|string',
            'password' => 'bail|required|string',
        ]);

        if ($this->attemptLogin($request)) {
            if (Auth::user()->role_user == 'super_admin') {
                return redirect()->route('dashboard_super_admin');
            } else if (Auth::user()->role_user == 'admin') {
                return redirect()->route('dashboard_admin');
            } else if (Auth::user()->role_user == 'volunteer') {
                return redirect()->route('dashboard_volunteer');
            } else {
                return abort(404);
            }
        }
        $this->sendFailedLoginResponse($request);
    }

    public function attemptLogin(Request $request)
    {
        $field_type = filter_var($request['username'], FILTER_VALIDATE_EMAIL) ? 'email':'username';
        return Auth::guard()->attempt(array(
            $field_type => $request['username'],
            'password' => $request['password'],
        ), $request->boolean('remember'));
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            'username' => [trans('auth.failed')],
        ]);
    }
}
