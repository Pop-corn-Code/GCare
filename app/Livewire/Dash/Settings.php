<?php

namespace App\Livewire\Dash;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Settings extends Component
{
    public $user;
    public $user_name = '';
    public $user_email = '';
    public $phone = '';
    public $old_pwd = '';
    public $new_pwd = '';
    public $new_pwd_confirmation = '';
    public $avatar;

    public function mount(){
        if(!Auth::id()){
            return redirect()->route('app.login-form');
        }
        $this->user = User::findOrFail(Auth::id());
        $this->user_name = $this->user->name;
        $this->user_email = $this->user->email;
        $this->phone = $this->user->phone;
        $this->avatar = $this->user->avatar;
    }

    public function update(){
        $this->validate([
            'avatar' => 'image|max:1024', // 1MB Max
        ]);
        dd($this->avatar);
        // if ($this->avatar('file')) {
        //     $imageFile = $request->file('file');
        //     $name = str_replace(' ', '_', time() . '_' . $imageFile->getClientOriginalName());
        //     $imageFile->move(public_path().'/media/',$name);
        //     $documentfile = '/media/'.$name;
        // }
        $this->user->name = $this->user_name;
        $this->user->email = $this->user_email;
        $this->user->avatar = $this->user_name;
    }


    public function render()
    {
        if(!Auth::id()){
            return redirect()->route('app.login-form');
        }
        return view('livewire.dash.settings');
    }
}
