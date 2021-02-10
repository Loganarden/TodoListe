<?php

use App\Http\Middleware\Authstatus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TacheController;

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
Route::resource('taches', TacheController::class)->middleware('Authstatus');

Route::get('/', function () {
    return view('welcome');
})->middleware('Authstatus');

Route::get('/',[TacheController::class,'index'])->middleware('Authstatus');
Route::get('/modificationtache',[TacheController::class,'edit'])->middleware('Authstatus');

Route::get('/connexion',[LoginController::class,'formulaireconnexion']);
Route::post('/connexion',[LoginController::class,'traitementconnexion']);

Route::get('/inscription',[LoginController::class,'formulaireinscription']);
Route::post('/inscription',[LoginController::class,'traitementinscription']);

Route::get('/deconnexion',[LoginController::class,'deconnexion']);
