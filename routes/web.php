<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\RegisterUserController;
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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::middleware(['auth:sanctum', 'verified'])->get('/register', function () {
  return view('auth.register');
})->name('register');

/*
Route::get('/register', function () {
    return view('auth.register');
})->name('register');*/

Route::get('/permisos',[PermisoController::class,'index'])->name('permisos')->middleware('permiso:root');
Route::post('/savePermiso',[PermisoController::class, 'savePermiso'])->name('savePermiso')->middleware('permiso:root');
Route::get('/showPermisos/{id}/show',[PermisoController::class,'show'])->name('showPermisos')->middleware('permiso:root'); // ejem para usar el los permisos
Route::resource('incidencias', 'IncidenciaController')->middleware(['auth']);
Route::get('incidencias/aceptar/{incidencia_id}', 'IncidenciaController@aceptar')->middleware('permiso:root');
Route::get('incidencias/rechazar/{incidencia_id}', 'IncidenciaController@rechazar')->middleware('permiso:root');
Route::get('incidencias/cerrar/{incidencia_id}', 'IncidenciaController@cerrar')->middleware('permiso:root');
Route::get('/registerUser',[RegisterUserController::class, 'registerUser'])->name('registro');
Route::post('/saveUser',[RegisterUserController::class, 'saveUser'])->name('guardarUsuario');
