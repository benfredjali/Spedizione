<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\BtrHelper;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('addShipment', [BtrHelper::class, 'addShipment']);

Route::get('pdf', [BtrHelper::class, 'ShipmentPDF']);

Route::get('getShipment/{parcelID}', [BtrHelper::class, 'getShipment']);


Route::get('delete/{numeric}/{alphanumeric}', [BtrHelper::class, 'DeleteShipment']);


