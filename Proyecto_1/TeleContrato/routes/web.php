<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\TransaccionController;
use App\Http\Controllers\ClienteController;


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

// Route::get('/', function () {
//     return view('index');
// })->name('inicio');

Route::get('/', [ContratoController::class, 'index'])->name('inicio');

Route::get('clientes/create', [ClienteController::class, 'create'])->name('clientes.create');

Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store');

Route::get('saldo', [ContratoController::class, 'saldo'])->name('contratos.saldo');

Route::resource('contratos', ContratoController::class)->only([
    'create', 'store'
]);

Route::resource('transacciones', TransaccionController::class)->only([
    'create', 'store'
]);
