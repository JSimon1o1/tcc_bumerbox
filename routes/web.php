<?php

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

Route::get('/', function () {
    return view('autenticacao.login');
});

Route::resource('usuarios', UsuarioController::class);

Route::get('/registro', function () {
    return view('layout.base');
});

Route::get('/acesso', function () {
    return view('layout.base');
});

Route::get('/minha-conta', function () {
    return view('conta.editar');
});
