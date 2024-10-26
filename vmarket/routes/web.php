<?php

use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('fornecedores', FornecedorController::class);


Route::resource('produtos', ProdutoController::class);

