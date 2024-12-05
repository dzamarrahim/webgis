<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getGeojson() {
        if ($this->geojson) {
            return asset('/storage/geojson/'.$this->geojson);
        }

        return 'No File';
    }
}
