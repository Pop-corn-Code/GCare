<?php

  // app/Http/Controllers/MapController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Geocoding;

class MapController extends Controller
{
    public function showHospitalMap(Request $request)
    {
        $address = $request->input('address');

        // Initialize Google Client
        $client = new Google_Client();
        $client->setApplicationName('YourAppName');
        $client->setDeveloperKey(env('GOOGLE_MAPS_API_KEY'));

        $geocodeService = new Google_Service_Geocoding($client);

        // Geocode the address
        $response = $geocodeService->geocode(array('address' => $address));
        $location = $response['results'][0]['geometry']['location'];
        
        $latitude = $location['lat'];
        $longitude = $location['lng'];

        return view('hospital-map', compact('latitude', 'longitude'));
    }
}
