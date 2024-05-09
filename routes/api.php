<?php

use App\Http\Controllers\CarrosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('carros/cadastro', [CarrosController::class, 'store']);


Route::post('carros/{modelo}',[CarrosController::class,'procurarPorModelo']);


Route::get('carros/retornarTodos',[CarrosController::class,'retornarTodos']);


Route::delete('excluir/carros/{id}',[CarrosController::class, 'excluir']);

Route::put('carros/atualizar', [CarrosController::class, 'update']);