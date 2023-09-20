<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

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

Route::get("/", [ProdutoController::class, 'index'])->name('listar-produtos');
Route::get("/cadastrar-produto", [ProdutoController::class, 'create'])->name('create-produto');
Route::post("/salvar-produto", [ProdutoController::class, 'store'])->name('store-produto');
Route::get("/editar-produto/{id}", [ProdutoController::class, 'edit'])->name('edit-produto');
Route::get("/ver-produto/{id}", [ProdutoController::class, 'show'])->name('show-produto');
Route::put("/atualizar-produto/{id}", [ProdutoController::class, 'update'])->name('update-produto');
Route::delete("/deletar-produto/{id}", [ProdutoController::class, 'delete'])->name('delete-produto');

