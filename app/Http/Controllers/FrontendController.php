<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use App\Models\Kecamatan;
use App\Models\Centre_Point;
use Illuminate\Http\Request;
use Spatie\FlareClient\Http\Client;
use Illuminate\Routing\Controller;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function page() {
        $user = auth()->user();
        return view('frontend.home', compact('user'));
    }

    public function contact() {
        return view('frontend.contact');
    }
    
    public function spots(Request $request) {
        $centrePoint = Centre_Point::get()->first();
        $spot = Spot::get();
        $kecamatan = Kecamatan::get();

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

        return view('frontend.webgis', [
            'centrePoint' => $centrePoint,
            'spot' => $spot,
            'kecamatan' => $kecamatan
        ], compact('weatherData'));

    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
    }

    public function detailSpot($slug)
    {
        $spot = Spot::where('slug',$slug)->first();
        return view('frontend.detail',['spot' => $spot]);
    }
}
