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
                    <div class="card-header">Leaflet GeoJSON</div>
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

        const kantor = {
            "type": "FeatureCollection",
            "features": [
                {
                "type": "Feature",
                "properties": {
                    "popupContent": "Kantor Bupati Aceh Tamiang"
                },
                "geometry": {
                    "coordinates": [
                    98.04566300024896,
                    4.300792918915917
                    ],
                    "type": "Point"
                }
                },
                {
                "type": "Feature",
                "properties": {
                    "popupContent": "RSUD Aceh Tamiang"
                },
                "geometry": {
                    "coordinates": [
                    [
                        [
                        98.05315415544112,
                        4.284567699022489
                        ],
                        [
                        98.05236039362194,
                        4.284541205341682
                        ],
                        [
                        98.05232731728086,
                        4.284586558207138
                        ],
                        [
                        98.05239760459665,
                        4.284792707526293
                        ],
                        [
                        98.05178155775872,
                        4.284763846620237
                        ],
                        [
                        98.05170713599165,
                        4.284677263895503
                        ],
                        [
                        98.0515086779497,
                        4.2841124144526646
                        ],
                        [
                        98.05149652098703,
                        4.283978747072894
                        ],
                        [
                        98.05150479007187,
                        4.283463373039325
                        ],
                        [
                        98.0514096955942,
                        4.283397405138004
                        ],
                        [
                        98.051264986604,
                        4.283380913162162
                        ],
                        [
                        98.0512608520616,
                        4.283174763428789
                        ],
                        [
                        98.05127325569043,
                        4.2829067686932945
                        ],
                        [
                        98.05128979386024,
                        4.2826552658556665
                        ],
                        [
                        98.05175286262471,
                        4.2826511428577305
                        ],
                        [
                        98.05243092760236,
                        4.2826552658556665
                        ],
                        [
                        98.0526790001536,
                        4.282638773863795
                        ],
                        [
                        98.05290639999419,
                        4.282622281870815
                        ],
                        [
                        98.05305937806764,
                        4.282630527866971
                        ],
                        [
                        98.05311312712098,
                        4.282688249839012
                        ],
                        [
                        98.05314175181383,
                        4.283986357535184
                        ],
                        [
                        98.05315415544112,
                        4.284567699022489
                        ]
                    ]
                    ],
                    "type": "Polygon"
                }
                }
            ]
            }

        var map = L.map('map', {
            center:[4.279276698634141, 98.06498390034722],
            zoom:12,
            layers:[osm]
        })

        var baseLayers = {
            'Open Street Map': osm,
            'Esri World': Esri_WorldStreetMap,
            'Open Topo Map': OpenTopoMap
        }

        function onEachFeature(feature, layer) {
            let popupContent = ''

            if (feature.properties && feature.properties.popupContent) {
                popupContent += feature.properties.popupContent
            }

            layer.bindPopup(popupContent);
        }

        const geoJson = L.geoJSON(kantor, {
            style(feature) {
                return feature.properties && feature.properties.style
            },
            onEachFeature, 
            // pointToLayer(feature, latlng) {
            //     return
            // }
        }).addTo(map)

        const layerControl = L.control.layers(baseLayers).addTo(map)
    </script>
@endpush