<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Seguridad;
//para saber si una vista existe se hace lo siguiente:
//use Illuminate\Support\Facades\View;

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


Route::get('/', function(){
    return view ('auth.login');
});

//rutas de reportes
Route::get('articulos/pdf',[App\Http\Controllers\ArticuloController::class, 'pdf' ] )->name('articulos.pdf');
Route::get('panaderiaingresos/pdf',[App\Http\Controllers\PanaderiaingresoController::class, 'pdf' ] )->name('panaderiaingresos.pdf');
Route::get('panaderiaventas/pdf',[App\Http\Controllers\PanaderiaventaController::class, 'pdf' ] )->name('panaderiaventas.pdf');
Route::get('users/pdf',[App\Http\Controllers\UserController::class, 'pdf' ] )->name('users.pdf');
Route::get('audits/pdf',[App\Http\Controllers\AuditoriaController::class, 'pdf' ] )->name('audits.pdf');
Route::get('novedades/pdf',[App\Http\Controllers\NovedadesController::class, 'pdf' ] )->name('novedades.pdf');

//rutas de crud
Route::resource('articulos', 'App\Http\Controllers\ArticuloController');
Route::resource('users', 'App\Http\Controllers\UserController');
Route::resource('panaderiaingresos', 'App\Http\Controllers\PanaderiaingresoController');
Route::resource('panaderiaventas', 'App\Http\Controllers\PanaderiaventaController');
Route::resource('audits', 'App\Http\Controllers\AuditoriaController');
Route::resource('novedades', 'App\Http\Controllers\NovedadesController');
Route::resource('ingredientes', 'App\Http\Controllers\IngredientesController');

//rutas de borrado lógico
Route::get('articulo/restore/one/{id}', [App\Http\Controllers\ArticuloController::class, 'restore'])->name('articulo.restore');
Route::get('articulo/forceDelete/one/{id}', [App\Http\Controllers\ArticuloController::class, 'forceDelete'])->name('articulo.forceDelete');
Route::get('panaderiaingreso/restore/one/{id}', [App\Http\Controllers\PanaderiaingresoController::class, 'restore'])->name('panaderiaingreso.restore');
Route::get('panaderiaingreso/forceDelete/one/{id}', [App\Http\Controllers\PanaderiaingresoController::class, 'forceDelete'])->name('panaderiaingreso.forceDelete');
Route::get('panaderiaventa/restore/one/{id}', [App\Http\Controllers\PanaderiaventaController::class, 'restore'])->name('panaderiaventa.restore');
Route::get('panaderiaventa/forceDelete/one/{id}', [App\Http\Controllers\PanaderiaventaController::class, 'forceDelete'])->name('panaderiaventa.forceDelete');
Route::get('novedade/restore/one/{id}', [App\Http\Controllers\NovedadesController::class, 'restore'])->name('novedades.restore');
Route::get('novedade/forceDelete/one/{id}', [App\Http\Controllers\NovedadesController::class, 'forceDelete'])->name('novedades.forceDelete');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    //Route::get('permisos', [Seguridad\PermisosController::class, 'index'])->name('permisos.index');
});
