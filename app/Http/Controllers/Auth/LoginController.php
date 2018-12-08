<?php

namespace App\Http\Controllers\Auth;

use App\Cart;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;
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

    use AuthenticatesUsers {
        attemptLogin as attemptLoginAtAuthenticatesUsers;
    }

    protected function authenticated(Request $request, $user)
    {
        $carts = Session::get('carts');
        if($carts !== null){
            foreach ($carts as $cart){
                $crt  = new Cart();
                $crt->id_product = $cart->id_product;
                $crt->id_user = Auth::user()->id;
                $crt->quantity = $cart->quantity;
                $crt->comment = $cart->comment;
                $crt->sub_total_price = $cart->sub_total_price;
                $crt->is_active = true;
                $crt->save();
            }
            Session::forget('carts');
        }

        if ( $user->hasRole('Customer') ) {// do your margic here
            return redirect()->route('landing-page');
        }

        return redirect('/home');
    }
    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Returns field name to use at login.
     *
     * @return string
     */
    public function username()
    {
        return config('auth.providers.users.field', 'email');
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        if ($this->username() === 'email') {
            return $this->attemptLoginAtAuthenticatesUsers($request);
        }
        if (! $this->attemptLoginAtAuthenticatesUsers($request)) {
            return $this->attempLoginUsingUsernameAsAnEmail($request);
        }
        return false;
    }

    /**
     * Attempt to log the user into application using username as an email.
     *
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    protected function attempLoginUsingUsernameAsAnEmail(Request $request)
    {
        return $this->guard()->attempt(
            ['email' => $request->input('username'), 'password' => $request->input('password')],
            $request->has('remember')
        );
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $user = User::where(['email' => $request['email']])->get();
        if(count($user) == 0){
            throw ValidationException::withMessages(["Email ".$request['email']." Belum Terdaftar!"]);
        }else{
            throw ValidationException::withMessages(["Email atau Password Anda Salah!"]);
        }

    }
}
