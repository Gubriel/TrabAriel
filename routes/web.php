<?php

use App\Http\Controllers\EquipamentosController;
use App\Http\Controllers\LocaisController;
use App\Http\Controllers\TiposController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ReservasController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tipo', [TiposController::class, 'listar']);
Route::get('/tipo/create', [TiposController::class, 'create'])->name('tipo.create');
Route::get('/tipo/{tipo_id}', [TiposController::class, 'show'])->name('tipo.show');
Route::post('/tipo', [TiposController::class, 'store']);
Route::patch('/tipo/{tipo_id}', [TiposController::class, 'update']);
Route::delete('/tipo/{tipo_id}', [TiposController::class, 'deletar']);
Route::resource('local', LocaisController::class);
Route::resource('equipamento', EquipamentosController::class);
Route::resource('cliente', ClientesController::class);
Route::resource('reserva', ReservasController::class);
