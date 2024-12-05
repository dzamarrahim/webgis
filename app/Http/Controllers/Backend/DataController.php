<?php

namespace App\Http\Controllers\Backend;

use App\Models\Spot;
use App\Models\Kecamatan;
use App\Models\Centre_Point;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    public function centrepoint() {
        $centrepoint = Centre_Point::latest()->get();
        return datatables()->of($centrepoint)
        ->addColumn('action', 'backend.CentrePoint.action')
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->toJson();
    }

    public function spot() {
        $spot = Spot::latest()->get();
        return datatables()->of($spot)
        ->addColumn('action', 'backend.Spot.action')
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->toJson();
    }

    public function kecamatan() {
        $kecamatan = Kecamatan::latest()->get();
        return datatables()->of($kecamatan)
        ->addColumn('action', 'backend.Kecamatan.action')
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->toJson();
    }
}
