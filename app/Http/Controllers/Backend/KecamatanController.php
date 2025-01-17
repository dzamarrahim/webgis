<?php

namespace App\Http\Controllers\Backend;

use App\Models\Kecamatan;
use App\Models\Centre_Point;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        return view('backend.Kecamatan.index', [
            "title" => "PUPR GIS Aceh Tamiang | Kecamatan Index"
        ], compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        return view('backend.Kecamatan.create', [
            'title' => 'PUPR GIS Aceh Tamiang | Kecamatan Create'
        ], compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'jumlah_penduduk' => 'required',
            'jumlah_desa' => 'required',
            'luas' => 'required',
            'geojson' => 'file|mimetypes:application/json,text/plain|max:2048',
            'warna' => ['required', 'regex:/^#[0-9a-fA-F]{6}$/']
        ]);

        $kecamatan = new Kecamatan;
        if ($request->hasFile('geojson')) {
            $file = $request->file('geojson');
            $originalName = $file->getClientOriginalName();
            $file->storeAs('public/geojson', $originalName);
        }

        $kecamatan->name = $request->input('name');
        $kecamatan->jumlah_penduduk = $request->input('jumlah_penduduk');
        $kecamatan->jumlah_desa = $request->input('jumlah_desa');
        $kecamatan->luas = $request->input('luas');
        $kecamatan->geojson = $file->getClientOriginalName();
        $kecamatan->warna = $request->input('warna');
        $kecamatan->save();

        if($kecamatan) {
            return to_route('kecamatan.index')->with('success', 'Data Berhasil Disimpan');
        } else {
            return to_route('kecamatan.index')->with('error', 'Data Gagal Disimpan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kecamatan $kecamatan)
    {
        $user = auth()->user();
        return view('backend.Kecamatan.edit', [
            'kecamatan' => $kecamatan,
            'title' => 'PUPR GIS Aceh Tamiang | Kecamatan Edit'
        ], compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $this->validate($request, [
            'name' => 'required',
            'jumlah_penduduk' => 'required',
            'jumlah_desa' => 'required',
            'luas' => 'required',
            'geojson' => 'file|mimetypes:application/json,text/plain|max:2048',
            'warna' => ['required', 'regex:/^#[0-9a-fA-F]{6}$/']
        ]);

        // Hapus File Image Pada Folder public/storage/ImageSpots
        if ($request->hasFile('geojson')) {
            // if (File::exists('storage/ImageSpots/'.$spot->image)) {
            //     File::delete('storage/ImageSpots/'.$spot->image);
            // }

            // Proses upload file image ke folder public/storage/ImageSpots
            // $file = $request->file('image');
            // $file->storeAs('public/ImageSpots', $file->hashName());
            // $spot->image = $file->hashName();

            // Proses hapus & upload file image ke folder public/upload/spots
            Storage::disk('local')->delete('public/geojson/' . ($kecamatan->geojson));
            $file = $request->file('geojson');
            $originalName = $file->getClientOriginalName();
            $file->storeAs('public/geojson', $originalName);
        }

        $kecamatan->name = $request->input('name');
        $kecamatan->jumlah_penduduk = $request->input('jumlah_penduduk');
        $kecamatan->jumlah_desa = $request->input('jumlah_desa');
        $kecamatan->luas = $request->input('luas');
        $kecamatan->geojson = $file->getClientOriginalName();
        $kecamatan->warna = $request->input('warna');
        $kecamatan->update();

        if($kecamatan) {
            return to_route('kecamatan.index')->with('success', 'Data Berhasil Diupdate');
        } else {
            return to_route('kecamatan.index')->with('error', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        Storage::disk('local')->delete('public/geojson/' . ($kecamatan->geojson));
        $kecamatan->delete();
        return redirect()->back();
    }
}
