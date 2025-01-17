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
        $spot = Spot::count();
        $kecamatan = Kecamatan::count();
        return view('home', [
            "title" => "PUPR GIS Aceh Tamiang | Dashboard"
        ], compact('user', 'spot', 'kecamatan'));
    }

    public function simple_map() {
        $user = auth()->user();
        return view('leaflet.simple-map', [
            "title" => "PUPR GIS Aceh Tamiang | Simple Map Leaflet"
        ], compact('user'));
    }

    public function marker() {
        $user = auth()->user();
        return view('leaflet.marker', [
            "title" => "PUPR GIS Aceh Tamiang | Marker Leaflet"
        ], compact('user'));
    }

    public function circle() {
        $user = auth()->user();
        return view('leaflet.circle', [
            "title" => "PUPR GIS Aceh Tamiang | Circle Leaflet"
        ], compact('user'));
    }

    public function polygon() {
        $user = auth()->user();
        return view('leaflet.polygon', [
            "title" => "PUPR GIS Aceh Tamiang | Polygon Leaflet"
        ], compact('user'));
    }
    
    public function polyline() {
        $user = auth()->user();
        return view('leaflet.polyline', [
            "title" => "PUPR GIS Aceh Tamiang | Polyline Leaflet"
        ], compact('user'));
    }
    
    public function rectangle() {
        $user = auth()->user();
        return view('leaflet.rectangle', [
            "title" => "PUPR GIS Aceh Tamiang | Rectangle Leaflet"
        ], compact('user'));
    }

    public function layers() {
        $user = auth()->user();
        return view('leaflet.layer', [
            "title" => "PUPR GIS Aceh Tamiang | Layer Leaflet"
        ], compact('user'));
    }

    public function layer_group() {
        $user = auth()->user();
        return view('leaflet.layer_group', [
            "title" => "PUPR GIS Aceh Tamiang | Layer Group Leaflet"
        ], compact('user'));
    }

    public function geojson() {
        $user = auth()->user();
        return view('leaflet.geojson', [
            "title" => "PUPR GIS Aceh Tamiang | GeoJSON Leaflet"
        ], compact('user'));
    }

    public function getCoordinate() {
        $user = auth()->user();
        return view('leaflet.get_coordinate', [
            "title" => "PUPR GIS Aceh Tamiang | Get Coordinate Leaflet"
        ], compact('user'));
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
        return view('leaflet.cuaca', [
            "title" => "PUPR GIS Aceh Tamiang | Open Weather Map API"
        ], compact('weatherData', 'user'));
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}



}
