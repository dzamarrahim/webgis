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
                    <div class="card-header">Polygon</div>
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
        const map = L.map('map').setView([4.27878454788613, 98.06961875737844], 11);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        const polygon = L.polygon([
		[4.297272080183795, 98.05846076822914],
		[4.271423646802999, 98.05983405920138],
		[4.287172465189265, 98.07185035520828]
	]).addTo(map).bindPopup('I am a polygon.');

        const polygon2 = L.polygon([
		[4.3073715614058115, 98.04610114947917],
		[4.2691982441931655, 97.98104148967026],
		[4.289226634993143, 97.99786430407995]
	]).addTo(map).bindPopup('I am a polygon.');

    </script>
@endpush