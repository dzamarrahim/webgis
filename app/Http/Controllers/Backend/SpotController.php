<?php

namespace App\Http\Controllers\Backend;

use App\Models\Spot;
use Illuminate\Support\Str;
use App\Models\Centre_Point;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        return view('backend.Spot.index', [
            "title" => "PUPR GIS Aceh Tamiang | Spot Index"
        ], compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('backend.Spot.create', [
            'title' => 'PUPR GIS Aceh Tamiang | Spot Create'
        ], compact('user'));
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
    public function edit(Spot $spot) 
    {
        $user = auth()->user();
        return view('backend.Spot.edit', [
            'spot' => $spot,
            'title' => 'PUPR GIS Aceh Tamiang | Spot Edit'
        ], compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spot $spot)
    {
        $this->validate($request, [
            'coordinate' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image' => 'file|image|mimes:png,jpg,jpeg'
        ]);

        // Hapus File Image Pada Folder public/storage/ImageSpots
        if ($request->hasFile('image')) {
            // if (File::exists('storage/ImageSpots/'.$spot->image)) {
            //     File::delete('storage/ImageSpots/'.$spot->image);
            // }

            // Proses upload file image ke folder public/storage/ImageSpots
            // $file = $request->file('image');
            // $file->storeAs('public/ImageSpots', $file->hashName());
            // $spot->image = $file->hashName();

            // Proses hapus & upload file image ke folder public/upload/spots
            Storage::disk('local')->delete('public/ImageSpots/' . ($spot->image));
            $file = $request->file('image');
            $file->storeAs('public/ImageSpots', $file->hashName());
            $spot->image = $file->hashName();
        }

        $spot->name = $request->input('name');
        $spot->slug = Str::slug($request->name, '-');
        $spot->description = $request->input('description');
        $spot->coordinates = $request->input('coordinate');
        $spot->update();

        if($spot) {
            return to_route('spot.index')->with('success', 'Data Berhasil Diupdate');
        } else {
            return to_route('spot.index')->with('error', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $spot = Spot::findOrFail($id);
        Storage::disk('local')->delete('public/ImageSpots/' . ($spot->image));
        $spot->delete();
        return redirect()->back();
    }
}
