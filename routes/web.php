<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EstoquesController;
use App\Http\Controllers\homeInicialController;
use App\Http\Controllers\LocaisController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::resource('usuarios', UsuariosController::class);

Route::resource('homeInicial', homeInicialController::class);

Route::resource('login', LoginController::class);

Route::middleware(['auth'])->group(function () {
    Route::resource('estoques', EstoquesController::class);
});

Route::resource('estoques', EstoquesController::class)->middleware('auth');

// Rota para fazer logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::middleware(['auth'])->group(function () {
    Route::resource('estoques', EstoquesController::class);
    Route::resource('locais', LocaisController::class); // Exemplo de recurso para LocaisController
    Route::resource('produtos', ProdutosController::class); // Exemplo de recurso para ProdutosController
});

// Rotas para registro de usuário usando Fortify
Route::get('register', [RegisteredUserController::class, 'create'])
    ->middleware('guest')
    ->name('register');

Route::post('register', [RegisteredUserController::class, 'store'])
    ->middleware('guest');

// No arquivo routes/web.php

Route::get('/', function () {
    return redirect('/homeInicial');
});