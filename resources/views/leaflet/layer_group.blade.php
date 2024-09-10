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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Leaflet Layer Group</div>
                    <div class="card-body">
                        <div id="map"></div>
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

        const office = L.layerGroup();
        const places = L.layerGroup();

        var map = L.map('map', {
            center:[4.279276698634141, 98.06498390034722],
            zoom:12,
            layers:[osm, places, office]
        })

        var marker1 = L.marker([4.292274587075889, 98.06024333207961]).bindPopup('Marker Ke 1').addTo(office)
        var marker2 = L.marker([4.297996992317326, 98.0473421296961]).bindPopup('Marker Ke 2').addTo(office)
        var marker3 = L.marker([4.312407238829645, 98.05429537500954]).bindPopup('Marker Ke 3').addTo(office)
        var marker4 = L.marker([4.266445064481526, 98.06014754909103]).bindPopup('Marker Ke 4').addTo(places)

        var baseLayers = {
            'Open Street Map': osm,
            'Esri World': Esri_WorldStreetMap,
            'Open Topo Map': OpenTopoMap
        }

        var overLayers = {
            'Office':office,
            'Places':places
        }

        const layerControl = L.control.layers(baseLayers, overLayers).addTo(map)
    </script>
@endpush