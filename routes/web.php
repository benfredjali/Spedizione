<?php



use Illuminate\Support\Facades\Route;
use App\Helpers\BtrHelper;
use App\Helpers\YukatelHelper;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\SpedizioneController;
use App\Http\Controllers\GuzzleController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\StockController;



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

Route::resource('spediziones', SpedizioneController::class);

Route::get('show', [SpedizioneController::class, 'show']);

Route::get('store', [SpedizioneController::class, 'store']);
Route::get('get', [SpedizioneController::class, 'get']);  


/**YukatelHelper */

Route::get('getStockList', [YukatelHelper::class, 'getStockList']);
Route::get('addStockList', [YukatelHelper::class, 'addStockList']);
Route::get('deleteStockList/{id}', [YukatelHelper::class, 'deleteStockList']);
Route::get('getOrders', [YukatelHelper::class, 'getOrders']);
Route::get('getAdress', [YukatelHelper::class, 'getAdress']);
Route::get('getOdersById/{id}', [YukatelHelper::class, 'getOdersById']);
Route::get('stockCheck/{artc}/{qnty}', [YukatelHelper::class, 'stockCheck']);
Route::resource('stocks', StockController::class);
Route::get('show', [StockController::class, 'leggiExcel']);



