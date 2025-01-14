<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Centre_Point;
use Illuminate\Http\Request;

class CentrePointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        return view('backend.CentrePoint.index', [
            "title" => "PUPR GIS Aceh Tamiang | Center Point Index"
        ], compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('backend.CentrePoint.create', [
            "title" => "PUPR GIS Aceh Tamiang | Center Point Create"
        ], compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'coordinate' => 'required'
        ]);

        $centrePoint = new Centre_Point;
        $centrePoint->coordinates = $request->input('coordinate');
        $centrePoint->save();

        if($centrePoint) {
            return to_route('centre-point.index')->with('success', 'Data Berhasil Disimpan');
        } else {
            return to_route('centre-point.index')->with('error', 'Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Centre_Point $centrePoint)
    {
        $user = auth()->user();
        $centrePoint = Centre_Point::findOrFail($centrePoint->id);
        return view('backend.CentrePoint.edit', [
            'centrePoint' => $centrePoint,
            'title' => 'PUPR GIS Aceh Tamiang | Center Point Edit'
        ], compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Centre_Point $centrePoint)
    {
        $centrePoint = Centre_Point::findOrFail($centrePoint->id);
        $centrePoint->coordinates = $request->input('coordinate');
        $centrePoint->update();

        if($centrePoint) {
            return to_route('centre-point.index')->with('success', 'Data Berhasil Diupdate');
        } else {
            return to_route('centre-point.index')->with('error', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $centrePoint = Centre_Point::findOrFail($id);
        $centrePoint->delete();
        return redirect()->back();
    }
}
