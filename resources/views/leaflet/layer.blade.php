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
                    <div class="card-header">Leaflet Layer Control</div>
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

        var map = L.map('map', {
            center:[-4.038872728698584, 126.13021368020961],
            zoom:4,
            layers:[osm]
        })

        var iconMarker = L.icon({
            iconUrl: '{{ asset('icon/marker.png') }}',
            iconSize: [38, 38],
        })
        var marker = L.marker([-4.038872728698584, 126.13021368020961], {icon:iconMarker, draggable:true}).bindPopup('Tampilan Pesan Disini').addTo(map);

        var latlngpolygon = [
            [
                [4.297272080183795, 98.05846076822914],
                [4.271423646802999, 98.05983405920138],
                [4.287172465189265, 98.07185035520828],
	        ],
            [
                [4.3073715614058115, 98.04610114947917],
                [4.2691982441931655, 97.98104148967026],
                [4.289226634993143, 97.99786430407995],
            ]
        ]

        var polygon = L.polygon(latlngpolygon).bindPopup('Data Polygon').addTo(map)

        var baseMaps = {
            'Open Street Map': osm,
            'Esri World': Esri_WorldStreetMap,
            'Open Topo Map': OpenTopoMap
        }

        var overlayers = {
            'Marker':marker,
            'Polygon':polygon
        }

        L.control.layers(baseMaps, overlayers).addTo(map)
    </script>
@endpush