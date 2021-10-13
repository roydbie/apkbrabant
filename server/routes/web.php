<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;

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
Route::get('/agenda', function () {
    return view('agenda');
});

Route::get('/kentekensearch', function () {
    return view('kentekensearch');
});

Route::get('/car/{id}', [CarController::class, 'details']);
Route::get('/kentekensearch/kenteken={kenteken}', [CarController::class, 'show']);

Route::get('/test/', function () {
    $test = DB::select("SELECT werkzaamheden FROM planning WHERE kenteken = 'zjrb32'");
    return $test[0];
});
