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
                    <div class="card-header">Markers</div>
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
        const map = L.map('map').setView([-4.038872728698584, 126.13021368020961], 4);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        var iconMarker = L.icon({
            iconUrl: '{{ asset('icon/marker.png') }}',
            iconSize: [38, 38],
        })
        var marker = L.marker([-4.038872728698584, 126.13021368020961], {icon:iconMarker, draggable:true}).bindPopup('Tampilan Pesan Disini').addTo(map);

        var iconMarker = L.icon({
            iconUrl: '{{ asset('icon/marker.png') }}',
            iconSize: [38, 38],
        })
        var marker2 = L.marker([4.284416614775642, 98.05248110800463], {icon:iconMarker, draggable:true}).bindPopup('Tampilan Pesan Disini').addTo(map);
    </script>
@endpush