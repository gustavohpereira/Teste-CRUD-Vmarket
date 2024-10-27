<?php

use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\ProdutoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::resource('fornecedores', FornecedorController::class);
Route::delete('fornecedores/destroy', [FornecedorController::class, 'destroy'])->name('fornecedores.destroy');


Route::resource('produtos', ProdutoController::class);
Route::delete('produtos/destroy', [ProdutoController::class, 'destroy'])->name('produtos.destroy');

