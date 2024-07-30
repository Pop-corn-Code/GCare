<?php

namespace App\Livewire\Dash;

use Livewire\Component;
use App\Models\Symptom;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class RecentSymptom extends Component
{
    public $symptoms;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $userId = Auth::id();

        // Fetch the user's recent symptoms (last 30 days)
        $this->symptoms = Symptom::where('user_id', $userId)
                                 ->where('date', '>=', Carbon::now()->subDays(30))
                                 ->orderBy('date', 'desc')
                                 ->get();
    }

    public function render()
    {
        return view('livewire.dash.recent-symptom');
    }
}