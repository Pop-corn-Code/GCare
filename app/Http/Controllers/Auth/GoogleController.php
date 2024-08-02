<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('google_id', $googleUser->id)->first();
        if($user){
            Auth::login($user);
        }
        // dd($googleUser);
        $user = User::updateOrCreate([
            'google_id' => $googleUser->id,
        ], [
            'name' => $googleUser->name,
            'email' => $googleUser->email,
            'password' => encrypt('12345678'),
            'google_id' => $googleUser->id,
            'avatar' => $googleUser->avatar,
        ]);
     
        Auth::login($user);
     
        return redirect('/dash');
    }
    public function redirectToGmail()
    {
    }
    public function handleGmailCallback()
    {
        // Your authentication logic here
    }
}
