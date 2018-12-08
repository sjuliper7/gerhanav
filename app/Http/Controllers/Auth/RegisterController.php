<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\ModelHasRole;
use Illuminate\Support\Facades\DB;
use App\UserProfile;
use Symfony\Component\HttpKernel\Profiler\Profile;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

/**
 * Class RegisterController
 * @package %%NAMESPACE%%\Http\Controllers\Auth
 */
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('admin.auth.register');
    }

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => 'required|max:255',
            'username' => 'sometimes|required|max:255|unique:users',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'terms'    => 'required',
        ]);
    }

    public function register(Request $request)
    {
        $rules = [
            'name'     => 'required|max:255',
            'username' => 'sometimes|required|max:255|unique:users',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'terms'    => 'required',
        ];

        $customMessages = [
            'required' => 'Anda harus mengisi field :attribute.',
            'confirmed' => 'Password dan Konfirmasi Password Tidak Sesuai.',
            'unique' => 'Silahkan gunakan email lain. Email ini telah digunakan.',
            'max' => 'Panjang karakter yang anda input melebihi yang seharusnnya',
        ];

        $this->validate($request, $rules, $customMessages);

//        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        $fields = [
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => bcrypt($data['password']),
        ];

        $user = User::create($fields);

        DB::table('model_has_roles')->insert(
            [
                'role_id' => 2,
                'model_type' => "App\User",
                'model_id' => $user->id,
            ]
        );

        $userProfile = new UserProfile();
        $userProfile->profile_image= "---";
        $userProfile->full_name = "---";
        $userProfile->date_of_birth= "---";
        $userProfile->address = "---";
        $userProfile->id_user = $user->id;
        $userProfile->save();


        return $user;

    }
}
