<?php

namespace App\Livewire\Dash;

use Livewire\Component;
use App\Models\Symptom;
use App\Models\EnvironmentalData;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AllergyStatus extends Component
{
    public $symptoms;
    public $environmentalAlerts;

    public function mount()
    {
        if(!Auth::id()){
            return redirect()->route('app.login-form');
        }
        $this->loadData();
    }

    public function loadData()
    {
        $userId = Auth::id();

        // Fetch the user's symptoms
        $this->symptoms = Symptom::where('user_id', $userId)
                                 ->orderBy('date', 'desc')
                                 ->get();

        // Fetch the user's environmental data alerts
        $this->environmentalAlerts = EnvironmentalData::where('user_id', $userId)
                                                      ->where('alert', true)
                                                      ->orderBy('created_at', 'desc')
                                                      ->get();
    }

    public function render()
    {
        if(!Auth::id()){
            return redirect()->route('app.login-form');
        }
        return view('livewire.dash.allergy-status');
    }
}