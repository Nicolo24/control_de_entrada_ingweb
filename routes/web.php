<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CasaController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\TokenController;

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

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('users', UserController::class)->middleware('auth');
Route::resource('casas', CasaController::class)->middleware('auth');
Route::resource('personas', PersonaController::class)->middleware('auth');
Route::post('movimientos.create_for_me',[MovimientoController::class,'create_for_me'])->name('movimiento.for_me');
Route::post('movimientos.create_for_else',[MovimientoController::class,'create_for_else'])->name('movimiento.for_else');
Route::resource('movimientos', MovimientoController::class)->middleware('auth');
Route::resource('tokens', TokenController::class)->middleware('auth');