<?php

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

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/minhaconta/{id}', [App\Http\Controllers\FuncionarioController::class, 'show']);

Route::post('/salvar', [App\Http\Controllers\FuncionarioController::class, 'store']);

Route::post('minhaconta/senha', [App\Http\Controllers\FuncionarioController::class, 'senha']);

Route::get('/getByPonto', [App\Http\Controllers\PontoController::class, 'store']);

Route::get('/usuarios/buscar', function () {
    return view('usuarios.buscar');
});

Route::post('/usuarios/search', [App\Http\Controllers\AdministradorController::class, 'search']);
Route::resource('/usuarios', App\Http\Controllers\AdministradorController::class);