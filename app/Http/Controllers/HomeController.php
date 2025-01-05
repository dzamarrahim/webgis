<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use App\Models\Kecamatan;
use App\Models\Centre_Point;
use Illuminate\Http\Request;
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
        return view('leaflet.simple-map');
    }

    public function marker() {
        return view('leaflet.marker');
    }

    public function circle() {
        return view('leaflet.circle');
    }

    public function polygon() {
        return view('leaflet.polygon');
    }
    
    public function polyline() {
        return view('leaflet.polyline');
    }
    
    public function rectangle() {
        return view('leaflet.rectangle');
    }

    public function layers() {
        return view('leaflet.layer');
    }

    public function layer_group() {
        return view('leaflet.layer_group');
    }

    public function geojson() {
        return view('leaflet.geojson');
    }

    public function getCoordinate() {
        return view('leaflet.get_coordinate');
    }

}
