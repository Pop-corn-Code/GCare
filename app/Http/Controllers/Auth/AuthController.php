<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    private function isLoggedIn()
    {
        $status = false;
        if(Auth::user()){
            $status = true;
        }
        return $status;
    }

    public function loginForm(){
        if($this->isLoggedIn()){
            return redirect('/dash');
        }
        return view('auth.login');
    }
    public function registerForm(){
        if($this->isLoggedIn()){
            return redirect('/dash');
        }
        return view('auth.register');
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name'=>"required",
            'email'=>"required|string|email|unique:users",
            'password'=>"required|string|confirmed|min:6",
        ]);
        if($validator->fails()){
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        }

        $user = new User();

        $user->create(array_merge(
            $validator->validated(),
            ['password'=>bcrypt($request->password)]
        ));

        return redirect()->route('app.login')->with('success', 'User register with success!');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        if($this->isLoggedIn()){
            return redirect()->intended('/dash');
        }
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dash');
            // return redirect()->route( 'app.dash.index' );
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('app.login-form');
    }

}
