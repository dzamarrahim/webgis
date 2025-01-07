@extends('layouts.dashboard-volt')

@section('css')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
        crossorigin=""/>
<style>
    #map {
            height: 500px; /* Atur tinggi peta */
        }
</style>
@endsection

@section('content')
<h1>Weather Map: {{ $weatherData['name'] }}</h1>
<p>Temperature: {{ $weatherData['main']['temp'] }}°C</p>
<p>Weather: {{ $weatherData['weather'][0]['description'] }}</p>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <form method="GET" action="/cuaca">
                <label for="lat">Latitude:</label>
                <input type="text" id="lat" name="lat" required>
                <label for="lon">Longitude:</label>
                <input type="text" id="lon" name="lon" required>
                <button type="submit">Get Weather</button>
            </form>
            <div class="card">
                <div class="card-header">Circle</div>
                <div class="card-body">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('javascript')
    <!-- Tambahkan JavaScript Leaflet -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script>
        // Inisialisasi Peta
        var map = L.map('map').setView([{{ $weatherData['coord']['lat'] }}, {{ $weatherData['coord']['lon'] }}], 10);

        // Tambahkan Layer Peta
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Tambahkan Marker
        L.marker([{{ $weatherData['coord']['lat'] }}, {{ $weatherData['coord']['lon'] }}]).addTo(map)
            .bindPopup("<b>Aceh Tamiang</b><br>Suhu: {{ $weatherData['main']['temp'] }}°C<br>Cuaca Saat Ini: {{ $weatherData['weather'][0]['description'] }}")
            .openPopup();
    </script>
@endpush