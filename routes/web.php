<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::get('/', [\App\Http\Controllers\FrontendController::class, 'page'])->name('page');
Route::get('/webgis', [\App\Http\Controllers\FrontendController::class, 'spots'])->name('webgis')->middleware('auth');
Route::get('/contact', [\App\Http\Controllers\FrontendController::class, 'contact'])->name('contact');
Route::get('/detail-spot/{slug}',[\App\Http\Controllers\FrontendController::class,'detailSpot'])->name('detail-spot');

Auth::routes();

Route::middleware(['admin'])->group(function() {
    // Example
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/simple-map', [App\Http\Controllers\HomeController::class, 'simple_map'])->name('simple-map');
    Route::get('/markers', [App\Http\Controllers\HomeController::class, 'marker'])->name('markers');
    Route::get('/circle', [App\Http\Controllers\HomeController::class, 'circle'])->name('circle');
    Route::get('/polygon', [App\Http\Controllers\HomeController::class, 'polygon'])->name('polygon');
    Route::get('/polyline', [App\Http\Controllers\HomeController::class, 'polyline'])->name('polyline');
    Route::get('/rectangle', [App\Http\Controllers\HomeController::class, 'rectangle'])->name('rectangle');
    Route::get('/layer', [App\Http\Controllers\HomeController::class, 'layers'])->name('layer');
    Route::get('/layer-group', [App\Http\Controllers\HomeController::class, 'layer_group'])->name('layer-group');
    Route::get('/geojson', [App\Http\Controllers\HomeController::class, 'geojson'])->name('geojson');
    Route::get('/get-coordinate', [App\Http\Controllers\HomeController::class, 'getCoordinate'])->name('getCoordinate');
    Route::get('/cuaca', [App\Http\Controllers\HomeController::class, 'getWeatherByRegion'])->name('getWeatherByRegion');

    // Route Datatable
    Route::get('/spot/data', [\App\Http\Controllers\Backend\DataController::class, 'spot'])->name('spot.data');
    Route::get('/kecamatan/data', [\App\Http\Controllers\Backend\DataController::class, 'kecamatan'])->name('kecamatan.data');
    Route::get('/user/data', [\App\Http\Controllers\Backend\DataController::class, 'user'])->name('user.data');

    // Backend
    Route::get('/spot/{spot}/cetak', [\App\Http\Controllers\Backend\SpotController::class, 'cetakPdf'])->name('spot.cetak');
    Route::resource('/spot', (\App\Http\Controllers\Backend\SpotController::class));
    Route::resource('/kecamatan', (\App\Http\Controllers\Backend\KecamatanController::class));
    Route::resource('/users', (\App\Http\Controllers\Backend\UsersController::class));
});