<?php

namespace App\Livewire\Dash;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Conversation extends Component
{
    public function mount(){

        if(!Auth::id()){
            return redirect()->route('app.login-form');
        }
    }
    public function render()
    {
        if(!Auth::id()){
            return redirect()->route('app.login-form');
        }
        return view('livewire.dash.conversation');
    }
}
