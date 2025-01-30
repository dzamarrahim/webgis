<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Spot</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { width: 100%; text-align: center; }
        .spot-info { text-align: left; margin-bottom: 20px; }
        .map { width: 100%; height: 300px; }
        .img-preview { max-width: 300px; height: auto; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Spot - {{ $spot->name }}</h2>
        <div class="spot-info">
            <p><strong>Kecamatan:</strong> {{ $spot->kecamatan->name }}</p>
            <p><strong>Koordinat:</strong> {{ $spot->coordinates }}</p>
            <p><strong>Deskripsi:</strong> {{ $spot->description }}</p>
        </div>
        <div>
            <strong>Foto Spot:</strong><br>
            <img src="{{ public_path('storage/ImageSpots/'.$spot->image) }}" class="img-preview">
        </div>
        <div>
            <strong>Peta Lokasi:</strong><br>
            <img src="{{ $mapUrl }}" width="600" height="300">
        </div>
    </div>
</body>
</html>
