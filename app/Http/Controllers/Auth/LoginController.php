<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $validData = User::where('email',$email)->first();
        $checked_password = password_verify($password ,@$validData->password);

        if($checked_password == false){
            return redirect()->back()->with('message','Login faid');
        }
        if($validData->status == '0'){
            return redirect()->back()->with('message','You are not verified!');
        }
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect()->route('login');
        }
    }

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
}
