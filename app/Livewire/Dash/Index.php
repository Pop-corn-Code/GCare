<?php

namespace App\Livewire\Dash;

use App\Models\EnvironmentalData;
use App\Models\Recommendation;
use App\Models\Symptom;
use App\Models\Trigger;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $newSymptomsToday;
    public $highSeveritySymptomsToday;
    public $pendingRecommendations;
    public $recentTriggersIdentified;
    public $currentAllergyStatus;
    public $environmentalAlertsToday;

    public $totalSymptomsThisMonth;
    public $totalHighSeveritySymptomsThisMonth;
    public $mostCommonTriggers;
    public $averageSeverityThisMonth;
    public $historicalEnvironmentalDataTrends;

    public function mount()
    {
        if (!Auth::user()) {
            return redirect()->route('app.login-form');
        }
        $this->calculateDashboardSummary();
        $this->calculateHistoricalSummary();
    }

    public function calculateDashboardSummary()
    {
        $userId = Auth::id();

        $this->newSymptomsToday = Symptom::where('user_id', $userId)
            ->whereDate('date', today())
            ->count();

        $this->highSeveritySymptomsToday = Symptom::where('user_id', $userId)
            ->whereDate('date', today())
            ->where('severity', '>', 7)
            ->count();

        $this->pendingRecommendations = Recommendation::where('user_id', $userId)
            ->where('status', 'pending')
            ->count();

        $this->recentTriggersIdentified = Trigger::where('user_id', $userId)
            ->where('created_at', '>=', now()->subWeek())
            ->count();

        $this->currentAllergyStatus = $this->calculateAllergyStatus($userId);

        $this->environmentalAlertsToday = EnvironmentalData::where('user_id', $userId)
            ->whereDate('recorded_at', today())
            ->where('alert', true)
            ->count();
    }

    private function calculateAllergyStatus($userId)
    {
        $symptoms = Symptom::where('user_id', $userId)
            ->whereDate('date', today())
            ->get();

        if ($symptoms->isEmpty()) {
            return 'No symptoms logged today.';
        }

        $averageSeverity = $symptoms->avg('severity');

        if ($averageSeverity < 4) {
            return 'Low';
        } elseif ($averageSeverity < 7) {
            return 'Moderate';
        } else {
            return 'High';
        }
    }

    public function calculateHistoricalSummary()
    {
        $userId = Auth::id();

        $this->totalSymptomsThisMonth = Symptom::where('user_id', $userId)
            ->whereMonth('date', now()->month)
            ->count();

        $this->totalHighSeveritySymptomsThisMonth = Symptom::where('user_id', $userId)
            ->whereMonth('date', now()->month)
            ->where('severity', '>', 7)
            ->count();

        $this->mostCommonTriggers = Trigger::where('user_id', $userId)
            ->select('trigger_type', DB::raw('count(*) as total'))
            // ->select('trigger', DB::raw('count(*) as total'))
            // ->groupBy('trigger')
            ->groupBy('trigger_type')
            ->orderBy('total', 'desc')
            ->limit(3)
            ->get()
            ->pluck('trigger_type')
            ->implode(', ');

        $this->averageSeverityThisMonth = Symptom::where('user_id', $userId)
            ->whereMonth('date', now()->month)
            ->avg('severity');

        $this->historicalEnvironmentalDataTrends = EnvironmentalData::where('user_id', $userId)
            ->whereMonth('recorded_at', now()->month)
            ->get()
            ->groupBy('data_type')
            ->map(function ($data, $type) {
                return [
                    'type' => $type,
                    'average' => $data->avg('value'),
                ];
            })
            ->values();
    }

    public function render()
    {
        return view('livewire.dash.index', [
            'newSymptomsToday' => $this->newSymptomsToday,
            'highSeveritySymptomsToday' => $this->highSeveritySymptomsToday,
            'pendingRecommendations' => $this->pendingRecommendations,
            'recentTriggersIdentified' => $this->recentTriggersIdentified,
            'currentAllergyStatus' => $this->currentAllergyStatus,
            'environmentalAlertsToday' => $this->environmentalAlertsToday,
            'totalSymptomsThisMonth' => $this->totalSymptomsThisMonth,
            'totalHighSeveritySymptomsThisMonth' => $this->totalHighSeveritySymptomsThisMonth,
            'mostCommonTriggers' => $this->mostCommonTriggers,
            'averageSeverityThisMonth' => $this->averageSeverityThisMonth,
            'historicalEnvironmentalDataTrends' => $this->historicalEnvironmentalDataTrends,
        ]);
    }
    // public function render()
    // {
    //     return view('livewire.dash.index');
    // }
}
