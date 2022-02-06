<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermisoController;
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

/*
Route::get('/register', function () {
    return view('auth.register');
})->name('register');*/

Route::get('/permisos',[PermisoController::class,'index'])->name('permisos');
Route::post('/savePermiso',[PermisoController::class, 'savePermiso'])->name('savePermiso');
Route::get('/showPermisos/{id}/show',[PermisoController::class,'show'])->name('showPermisos')->middleware('permiso:root'); // ejem para usar el los permisos
