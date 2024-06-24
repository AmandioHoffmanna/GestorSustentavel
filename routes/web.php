<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\LocaisController;
use App\Http\Controllers\EstoquesController;

Route::resource('/usuarios', UsuariosController::class);
Route::resource('/produtos', ProdutosController::class);
Route::resource('/locais', LocaisController::class);
Route::resource('/estoques', EstoquesController::class);
