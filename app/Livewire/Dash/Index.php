<?php

namespace App\Livewire\Dash;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Index extends Component
{
    public function mount(){
        if(!Auth::user()){
            return redirect()->route('app.login-form');
        }
    }
    public function render()
    {
        return view('livewire.dash.index');
    }
}
