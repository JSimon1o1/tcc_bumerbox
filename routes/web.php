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

/** Apenas para ver as telas será removido */
Route::get('/', function () {
    return view('autenticacao.login', ['fakeAuth' => false]);
});

Route::get('/conta', function () {
    return view('conta.editar');
});
/** Fim */

/**
 * Padrão que será utilizado
 */
Route::resource('usuarios', UsuarioController::class);
