<?php

namespace App\Livewire\Dash;

use Livewire\Component;
use App\Models\EnvironmentalData as EnvironmentalDataModel;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class EnvironmentalData extends Component
{
    public $environmentalData;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $userId = Auth::id();

        // Fetch the user's environmental data
        $this->environmentalData = EnvironmentalDataModel::where('user_id', $userId)
                                                         ->orderBy('created_at', 'desc')
                                                         ->get();
    }

    public function render()
    {
        return view('livewire.dash.environmental-data');
    }
}