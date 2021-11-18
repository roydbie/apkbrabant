<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/agenda', function () {
    return view('agenda');
})->middleware('auth');

Route::get('/kentekensearch', function () {
    return view('kentekensearch');
})->middleware('auth');

Route::get('/nieuw_werkorder', function () {
    return view('nieuw_werkorder');
})->middleware('auth');

Route::get('/nieuw_auto', function () {
    return view('nieuw_auto');
})->middleware('auth');

Route::get('/kentekensearch/kenteken={kenteken}', [CarController::class, 'show'])->middleware('auth');
Route::get('/nieuw_auto/kenteken={kenteken}/merk={merk}/type={type}/meldcode={meldcode}', [CarController::class, 'insertAuto'])->middleware('auth');
Route::get('/nieuw_werkorder/kenteken={kenteken}/werkzaamheden={werkzaamheden}/omschrijving={omschrijving}/melddatum={melddatum}/meldtijd={meldtijd}/ophaaldatum={ophaaldatum}/ophaaltijd={ophaaltijd}/status={status}/kilometerstand={kilometerstand}', [CarController::class, 'insert'])->middleware('auth');
Route::get('/nieuw_subwerkorder/kenteken={kenteken}/planning_id={planning_id}/omschrijving={omschrijving}/aantal={aantal}/kostenPerStuk={kostenPerStuk}/kostenTotaal={kostenTotaal}', [CarController::class, 'insertSubwerkorder'])->middleware('auth');
Route::get('/verwijder_werkorder/kenteken={kenteken}/id={id}', [CarController::class, 'delete'])->middleware('auth');
Route::get('/wijzig_status/kenteken={kenteken}/id={id}/status={status}', [CarController::class, 'updateStatus'])->middleware('auth');


Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth');
