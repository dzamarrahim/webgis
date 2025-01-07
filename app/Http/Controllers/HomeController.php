<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use App\Models\Kecamatan;
use App\Models\Centre_Point;
use Illuminate\Http\Request;
use Spatie\FlareClient\Http\Client;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        return view('home', compact('user'));
    }

    public function simple_map() {
        $user = auth()->user();
        return view('leaflet.simple-map', compact('user'));
    }

    public function marker() {
        $user = auth()->user();
        return view('leaflet.marker', compact('user'));
    }

    public function circle() {
        $user = auth()->user();
        return view('leaflet.circle', compact('user'));
    }

    public function polygon() {
        $user = auth()->user();
        return view('leaflet.polygon', compact('user'));
    }
    
    public function polyline() {
        $user = auth()->user();
        return view('leaflet.polyline', compact('user'));
    }
    
    public function rectangle() {
        $user = auth()->user();
        return view('leaflet.rectangle', compact('user'));
    }

    public function layers() {
        $user = auth()->user();
        return view('leaflet.layer', compact('user'));
    }

    public function layer_group() {
        $user = auth()->user();
        return view('leaflet.layer_group', compact('user'));
    }

    public function geojson() {
        $user = auth()->user();
        return view('leaflet.geojson', compact('user'));
    }

    public function getCoordinate() {
        $user = auth()->user();
        return view('leaflet.get_coordinate', compact('user'));
    }

    public function getWeatherByRegion(Request $request)
{
    $user = auth()->user();
    $lat = $request->input('lat', 4.283533070708643); // Default ke 0 jika tidak ada
    $lon = $request->input('lon', 98.05858611362056); // Default ke 0 jika tidak ada
    $apiKey = env('OPENWEATHER_API_KEY');

    try {
        $client = new \GuzzleHttp\Client();
        $response = $client->get("https://api.openweathermap.org/data/2.5/weather", [
            'query' => [
                'lat' => $lat,
                'lon' => $lon,
                'appid' => $apiKey,
                'units' => 'metric', // Celsius
            ],
        ]);

        $weatherData = json_decode($response->getBody(), true);

        // Kirim data ke view
        return view('leaflet.cuaca', compact('weatherData', 'user'));
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}



}
