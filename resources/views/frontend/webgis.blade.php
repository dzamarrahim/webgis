@extends('layouts.frontend')

@section('css')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-search@3.0.9/dist/leaflet-search.src.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.fullscreen@2.4.0/Control.FullScreen.min.css">
@endsection

@section('content')
    <div class="container my-4" style="padding-top: 5rem;">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border border-success border-3">
                    <div class="card-header fw-bold text-success bg-body">Aceh Tamiang</div>
                    <div class="card-body">
                        <div id="map" style="height: 500px"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="https://cdn.jsdelivr.net/npm/leaflet-search@3.0.9/dist/leaflet-search.src.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/leaflet.fullscreen@2.4.0/Control.FullScreen.min.js"></script>

    <script>
        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 17,
            attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
        });

        var Esri_WorldStreetMap = L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
            });

        var Esri_WorldImagery = L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
            });

        var googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        });

        var googleHybrid = L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}',{
            maxZoom: 20,
            subdomains:['mt0','mt1','mt2','mt3']
        });

        var kecamatan = L.layerGroup();
        var map = L.map('map', {
            center: [{{ $centrePoint->coordinates }}],
            zoom: 10,
            layers: [googleStreets, kecamatan],
            fullscreenControl: {
                pseudoFullscreen: false
            }
        })

        const baseLayers = {
            'Google Street': googleStreets,
            'Google Satellit': googleHybrid,
            'Open Street Map': osm,
            'Open Topo Map': OpenTopoMap,
            'Esri': Esri_WorldStreetMap,
            'World Imagery': Esri_WorldImagery
        }

        var datas = [
            @foreach ($spot as $key => $value)
                {
                    "loc": [{{ $value->coordinates }}],
                    "title": '{!! $value->name !!}'
                },
            @endforeach
        ]

        var markersLayer = new L.layerGroup()
        map.addLayer(markersLayer)

        var controlSearch = new L.Control.Search({
            position: 'topleft',
            layer: markersLayer,
            zoom: 15,
            markerLocation: true
        })

        map.addControl(controlSearch)

        for (i in datas) {
            var title = datas[i].title,
                loc = datas[i].loc,
                marker = new L.Marker(new L.latLng(loc), {
                    title: title
                })
            markersLayer.addLayer(marker)

            @foreach ($spot as $item)
                L.marker([{{ $item->coordinates }}])
                    .bindPopup(
                        "<div class='my-2'><img src='{{ $item->getImageAsset() }}' class='img-fluid' width='700px'></div>" +
                        "<div class='my-2'><strong>Nama Spot : </strong> <br>{{ $item->name }}</div>" +
                        "<div><a href='{{ route('detail-spot',$item->slug) }}' class='btn btn-outline-info'>Detail Spot</a></div>"
                    )
                    .addTo(map)
            @endforeach
        }

        var overLayers = {
            "Kecamatan": kecamatan 
        };

        const layerControl = L.control.layers(baseLayers, overLayers).addTo(map)

        L.control.scale().addTo(map);

        setInterval(function(){
            map.setView();
            setTimeout(function(){
                map.setView();
            }, 2000);
        }, 4000);

        // GeoJSON
        let geoLayer;

@foreach ($kecamatan as $key => $value)
    // Ambil file GeoJSON secara dinamis
    $.getJSON("<?= asset('storage/geojson/' . $value['geojson']) ?>", function(data) {
        geoLayer = L.geoJson(data, {
            style: function(feature) {
                return {
                    opacity: 1.0,
                    color: "black",
                    fillOpacity: 1.0,
                    fillColor: "red",
                }
            },
        }).addTo(kecamatan);

        geoLayer.eachLayer(function(layer) {
            layer.bindPopup("{{ $value->name }}");
        });
    });
@endforeach

    </script>
@endpush