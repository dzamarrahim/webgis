@extends('layouts.dashboard-volt')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>

    <style>
        #map { 
            height: 500px; 
        }
    </style>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Update Spot - {{ $kecamatan->name }}</div>
                    <div class="card-body">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Update Spot - {{ $kecamatan->name }}</div>
                    <div class="card-body">
                        <form action="{{ route('kecamatan.update',$kecamatan->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Nama Kecamatan</label>
                                <input type="text" class="form-control @error('name') 
                                    is-invalid
                                @enderror" name="name" id="name" value="{{ $kecamatan->name }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ @message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label for="">Jumlah Penduduk</label>
                                <input type="text" class="form-control @error('jumlah_penduduk')
                                    is-invalid 
                                @enderror" name="jumlah_penduduk" value="{{ $kecamatan->jumlah_penduduk }}">
                                @error('jumlah_penduduk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label for="">Jumlah Desa</label>
                                <input type="text" class="form-control @error('jumlah_desa')
                                    is-invalid 
                                @enderror" name="jumlah_desa" value="{{ $kecamatan->jumlah_desa }}">
                                @error('jumlah_desa')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label for="">Luas Kecamatan</label>
                                <input type="text" class="form-control @error('luas')
                                    is-invalid 
                                @enderror" name="luas" value="{{ $kecamatan->luas }}">
                                @error('luas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label for="">Upload GeoJSON</label>
                                <input type="file" class="form-control @error('geojson')
                                    is-invalid
                                @enderror" name="geojson" accept=".geojson" value="{{ $kecamatan->geojson }}">
                                @error('geojson')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group my-3">
                                <label for="">Pilih Warna</label>
                                <input type="color" class="form-control @error('warna')
                                    is-invalid
                                @enderror" name="warna" value="{{ $kecamatan->warna }}">
                                @error('warna')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm my-2">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin="">
    </script>

    <script>
        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 17,
            attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
        });

        var Esri_WorldStreetMap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
        });

        var map = L.map('map', {
            center:[4.22753516277714, 98.0612424068228],
            zoom:10,
            layers:[osm]
        })

        var marker = L.marker([4.22753516277714, 98.0612424068228], {draggable:true}).addTo(map);

        var baseMaps = {
            'Open Street Map': osm,
            'Esri World': Esri_WorldStreetMap,
            'Open Topo Map': OpenTopoMap
        }

        L.control.layers(baseMaps).addTo(map)

        // Cara Pertama
        function onMapClick(e) {
            var coords = document.querySelector("[name=coordinate]")
            var latitude = document.querySelector("[name=latitude]")
            var longitude = document.querySelector("[name=longitude]")
            var lat = e.latlng.lat
            var lng = e.latlng.lng

            if (!marker) {
                marker = L.marker(e.latlng).addTo(map)
            } else {
                marker.setLatLng(e.latlng)
            }

            coords.value = lat + "," + lng
            latitude.value = lat,
            longitude.value = lng
        }
        map.on('click', onMapClick)

        // Cara Kedua
        marker.on('dragend', function() {
            var coordinate = marker.getLatLng();
            marker.setLatLng(coordinate, {
                draggable:true
            })
            $('#coordinate').val(coordinate.lat + "," + coordinate.lng).keyup()
            $('#latitude').val(coordinate.lat).keyup()
            $('#longitude').val(coordinate.lng).keyup()
        })

                // GeoJSON
                let geoLayer;

    // Ambil file GeoJSON secara dinamis
    $.getJSON("{{ asset('storage/geojson/' . $kecamatan->geojson) }}", function(data) {
        geoLayer = L.geoJson(data, {
            style: function(feature) {
                return {
                    opacity: 1.0,
                    color: "black",
                    fillOpacity: 0.8,
                    fillColor: "{{$kecamatan->warna}}",
                }
            },
        }).addTo(map);

        geoLayer.eachLayer(function(layer) {
            layer.bindPopup("<div class='my-2'><strong>Nama Kecamatan : </strong> <br>{{ $kecamatan->name }}</div>" +
            "<div class='my-2'><strong>Jumlah Penduduk : </strong> <br>{{ $kecamatan->jumlah_penduduk }}</div>" +
            "<div class='my-2'><strong>Jumlah Desa : </strong> <br>{{ $kecamatan->jumlah_desa }}</div>" +
            "<div class='my-2'><strong>Luas : </strong> <br>{{ $kecamatan->luas }}</div>");
        });
    });
    </script>
@endpush