<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite as FacadesSocialite;

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
     * Where to redirect users after registration.
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender' => ['required'],
            'dateofbirth' => ['required'],
            'dateofbirth' => ['required'],
            'customCheckRegister' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'dateofbirth' => $data['dateofbirth'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider1()
    {
        return FacadesSocialite::driver('Google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback1()
    {
        $googleuser = FacadesSocialite::driver('Google')->user();

        $user = User::where('provider_id', $googleuser->getId())->first();

        if (!$user) {
            $user = User::create([
                'email' => $googleuser->getEmail(),
                'name' => $googleuser->getName(),
                'provider_id' => $googleuser->getId(),
            ]);
        }

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider2()
    {
        return FacadesSocialite::driver('Facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback2()
    {
        $facebookuser = FacadesSocialite::driver('Facebook')->user();

        $user = User::where('provider_id', $facebookuser->getId())->first();

        if (!$user) {
            $user = User::create([
                'email' => $facebookuser->getEmail(),
                'name' => $facebookuser->getName(),
                'provider_id' => $facebookuser->getId(),
            ]);
        }

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }

    /**
     * Redirect the user to the Github authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider3()
    {
        return FacadesSocialite::driver('Github')->redirect();
    }

    /**
     * Obtain the user information from Github.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback3()
    {
        $githubuser = FacadesSocialite::driver('Github')->user();

        $user = User::where('provider_id', $githubuser->getId())->first();

        if (!$user) {
            $user = User::create([
                'email' => $githubuser->getEmail(),
                'name' => $githubuser->getName(),
                'provider_id' => $githubuser->getId(),
            ]);
        }

        Auth::login($user, true);

        return redirect($this->redirectTo);
    }
}
