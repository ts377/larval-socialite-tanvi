<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\view\view;
use File;

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
    protected $redirectTo = '/home';

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
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->stateless()->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('facebook')->stateless()->user();


       // $fileContents = file_get_contents($userSocial->getAvatar());
      //  File::put(public_path() . '/uploads/profile/' . $userSocial->getId() . ".jpg", $fileContents);

        // check if user exists and log user in.

        $user = User::where('email', $userSocial->user['email'])->first();
        if($user){
            if(Auth::loginUsingId($user->id)){
               return redirect()->route('home');
            }

        }

        // else sign the user up
        $userSignup = User::create([
            'name' => $userSocial->user['name'],
            'email' => $userSocial->user['email'],
            'password' => Hash::make('1234'),


           //'facebook_profile' => $userSocial->profileUrl,
           // 'gender' => $userSocial->user['gender'],
        ]);




        //finally log the user in
        if($userSignup){
            if(Auth::loginUsingId($userSignup->id)) {
                return redirect()->route('home');
            }

        }







      //  $newvar = dd($userSocial);
        // return $newvar;
    }


}
