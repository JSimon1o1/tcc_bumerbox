<?php

use App\Http\Controllers\AutenticacaoController;
use App\Http\Controllers\ContaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', [AutenticacaoController::class, 'login'])->name('autenticacao.login');
Route::post('/autenticar', [AutenticacaoController::class, 'autenticar'])->name('autenticacao.autenticar');
Route::resource('home', HomeController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('conta', ContaController::class);
