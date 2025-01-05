<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use App\Models\Kecamatan;
use App\Models\Centre_Point;
use Illuminate\Http\Request;

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
    
    public function spots() {
        $centrePoint = Centre_Point::get()->first();
        $spot = Spot::get();
        $kecamatan = Kecamatan::get();

        return view('frontend.webgis', [
            'centrePoint' => $centrePoint,
            'spot' => $spot,
            'kecamatan' => $kecamatan
        ]);
    }

    public function detailSpot($slug)
    {
        $spot = Spot::where('slug',$slug)->first();
        return view('frontend.detail',['spot' => $spot]);
    }
}
