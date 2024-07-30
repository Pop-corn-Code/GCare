<?php

namespace App\Livewire\Dash;

use Livewire\Component;
use App\Models\EnvironmentalData;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class Trigger extends Component
{
    public $triggers;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $userId = Auth::id();

        // Fetch the user's environmental triggers
        $this->triggers = EnvironmentalData::where('user_id', $userId)
                                           ->where('alert', true)
                                           ->orderBy('created_at', 'desc')
                                           ->get();
    }

    public function render()
    {
        return view('livewire.dash.trigger');
    }
}