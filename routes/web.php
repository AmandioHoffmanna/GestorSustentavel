<?php
/*
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EstoquesController;
use App\Http\Controllers\locaisController;
use App\Http\Controllers\produtosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::resource('/usuarios', UsuariosController::class);

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::resource('estoques', EstoquesController::class);
    Route::resource('locais', locaisController::class);
    Route::resource('produtos', produtosController::class);
});

// Rotas para registro de usuário usando Fortify
Route::get('register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');
*/

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EstoquesController;
use App\Http\Controllers\LocaisController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::resource('usuarios', UsuariosController::class);

// Rota para fazer logout
Route::post('logout', [UsuariosController::class, 'logout'])->name('logout');


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::resource('estoques', EstoquesController::class);
    Route::resource('locais', LocaisController::class);
    Route::resource('produtos', ProdutosController::class);
});

// Rotas para registro de usuário usando Fortify
Route::get('register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

    