<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Socialite;
use App\User;
use Auth;
use App\Role;


 


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

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $userSocial = Socialite::driver('google')->user();
        $findUser = User::where('email',  $userSocial->email)->first();
        if ($findUser) {
            $user = $findUser;
        }
        else {
            $user = new User;
            $user->name = $userSocial->getName();
            $user->username = $userSocial->getNickname();  
            $user->email = $userSocial->getEmail();
            $user->image =  $user->getSocialAvatar($userSocial->getAvatar());
            $user->password = bcrypt(123456);
            $user->save();
            $userRole = Role::where('name','user')->first();   
            $user->roles()->attach($userRole);
        }
        Auth::login($user);
        return redirect('/home'); 
    }
    

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/');
      }

      protected function authenticated($request, $user)
      {
          if($user->hasAnyRoles(['superadmin' , 'admin' , 'Editor'])) {
              return redirect()->intended('/menage');
          }
          return redirect()->intended('/home');
      }
    
}
