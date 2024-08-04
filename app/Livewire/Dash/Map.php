<?php

namespace App\Livewire\Dash;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Map extends Component
{

    public $latitude;
    public $longitude;
    public $hospitals = [];
    public $error;

    public function mount(){
        if(!Auth::id()){
            return redirect()->route('app.login-form');
        }
        $this->fetchHospitals();
    }

    public function fetchHospitals()
    {
        $apiKey = env('GOOGLE_MAPS_API_KEY');
        $radius = 5000; // Radius in meters

        $response = Http::get("https://maps.googleapis.com/maps/api/place/nearbysearch/json", [
            'location' => "{$this->latitude},{$this->longitude}",
            'radius' => $radius,
            'type' => 'hospital',
            'key' => $apiKey,
        ]);

        if ($response->successful()) {
            $this->hospitals = $response->json('results');
        } else {
            $this->error = 'Unable to fetch hospitals.';
        }
    }
    public function render()
    {
        if(!Auth::id()){
            return redirect()->route('app.login-form');
        }
        return view('livewire.dash.map');
    }
}
