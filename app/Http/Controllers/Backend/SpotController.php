<?php

namespace App\Http\Controllers\Backend;

use App\Models\Spot;
use Illuminate\Support\Str;
use App\Models\Centre_Point;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.Spot.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $centrePoint = Centre_Point::get()->first();
        return view('backend.Spot.create', ['centrePoint' => $centrePoint]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 
        $this->validate($request, [
            'coordinate' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'file|image|mimes:png,jpg,jpeg'
        ]);

        $spot = new Spot;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $file->storeAs('public/ImageSpots', $file->hashName());
            $spot->image = $file->hashName();
        }

        $spot->name = $request->input('name');
        $spot->slug = Str::slug($request->name, '-');
        $spot->description = $request->input('description');
        $spot->coordinates = $request->input('coordinate');
        $spot->save();

        if($spot) {
            return to_route('spot.index')->with('success', 'Data Berhasil Disimpan');
        } else {
            return to_route('spot.index')->with('error', 'Data Gagal Disimpan');
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
