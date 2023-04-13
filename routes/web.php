<?php

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

Route::get('/', [App\Http\Controllers\AutenticacaoController::class, 'index'])->name('login');
Route::get('/logout', [App\Http\Controllers\AutenticacaoController::class, 'logout'])->name('logout');
Route::post('/autenticar', [App\Http\Controllers\AutenticacaoController::class, 'autenticar'])->name('autenticar');

Route::resource('home', App\Http\Controllers\HomeController::class);
Route::resource('usuarios', App\Http\Controllers\UsuarioController::class);
Route::resource('conta', App\Http\Controllers\ContaController::class);
Route::resource('registro', App\Http\Controllers\RegistroController::class);
Route::resource('minhaconta', App\Http\Controllers\MinhaContaController::class);
