<?php

use Illuminate\Support\Facades\Route;

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
    //return view('index');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('index');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/register', function () {
  return view('auth.register');
})->name('register');

Route::resource('incidencias', 'IncidenciaController')->middleware(['auth']);
Route::get('incidencias/aceptar/{incidencia_id}', 'IncidenciaController@aceptar')->middleware(['auth']);
Route::get('incidencias/rechazar/{incidencia_id}', 'IncidenciaController@rechazar')->middleware(['auth']);
Route::get('incidencias/cerrar/{incidencia_id}', 'IncidenciaController@cerrar')->middleware(['auth']);