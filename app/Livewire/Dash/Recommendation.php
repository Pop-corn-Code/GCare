<?php

namespace App\Livewire\Dash;

use Livewire\Component;
use App\Models\Recommendation as RecommendationModel;
use Illuminate\Support\Facades\Auth;

class Recommendation extends Component
{
    public $recommendations;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $userId = Auth::id();

        // Fetch the user's recommendations
        $this->recommendations = RecommendationModel::where('user_id', $userId)
                                               ->orderBy('created_at', 'desc')
                                               ->get();
    }

    public function render()
    {
        return view('livewire.dash.recommendation');
    }
}
