<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\PrincipalController;
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
Route::middleware('autorizacao')->group(function () {
    Route::resource('/cliente', ClienteController::class);
    Route::get('/consulta_cliente', [ClienteController::class, 'consulta'])->name('cliente.consulta');
    Route::post('/consulta_cliente', [ClienteController::class, 'consultar'])->name('cliente.consultar');
    
    Route::resource('/item', ItemController::class);
    Route::get('/consulta_item', [ItemController::class, 'consulta'])->name('item.consulta');
    Route::post('/consulta_item', [ItemController::class, 'consultar'])->name('item.consultar');
    Route::get('/adicionar_item/{id}', [ItemController::class, 'adicionarShow'])->name('item.adicionar');
    Route::post('/adicionar_item/{cliente}', [ItemController::class, 'adicionar'])->name('item.adicionar');
    Route::get('/remover_item/{cliente}/{item}', [ItemController::class, 'remover'])->name('item.remover');
});

Route::get('/', [PrincipalController::class, 'index'])->name('principal.index');
Route::get('/login', [PrincipalController::class, 'login'])->name('principal.login');
Route::post('/login', [PrincipalController::class, 'autorizate'])->name('principal.login');
Route::get('/logout', [PrincipalController::class, 'logout'])->name('principal.logout');
Route::get('/register', [PrincipalController::class, 'registerShow'])->name('principal.register');
Route::post('/register', [PrincipalController::class, 'register'])->name('principal.register');