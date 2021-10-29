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

Route::get('/nieuw_werkorder', function () {
    return view('nieuw_werkorder');
});

Route::get('/nieuw_auto', function () {
    return view('nieuw_auto');
});

Route::get('/kentekensearch/kenteken={kenteken}', [CarController::class, 'show']);
Route::get('/nieuw_auto/kenteken={kenteken}/merk={merk}/type={type}/meldcode={meldcode}', [CarController::class, 'insertAuto']);
Route::get('/nieuw_werkorder/kenteken={kenteken}/werkzaamheden={werkzaamheden}/datum={datum}/tijd={tijd}/status={status}/kilometerstand={kilometerstand}', [CarController::class, 'insert']);
Route::get('/nieuw_subwerkorder/kenteken={kenteken}/planning_id={planning_id}/omschrijving={omschrijving}/aantal={aantal}/kostenPerStuk={kostenPerStuk}/kostenTotaal={kostenTotaal}', [CarController::class, 'insertSubwerkorder']);
Route::get('/verwijder_werkorder/kenteken={kenteken}/id={id}', [CarController::class, 'delete']);
Route::get('/wijzig_status/kenteken={kenteken}/id={id}/status={status}', [CarController::class, 'updateStatus']);
