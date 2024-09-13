<?php

use App\Http\Controllers\FilmesController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('inicial');
})->name('index');

Route::get('/filmes', [FilmesController::class, 'index'])->name('filmes');

Route::get('/filmes/cadastrar', [FilmesController::class, 'cadastrar'])->name('filmes.cadastrar');

Route::post('/filmes/cadastrar',[FilmesController::class, 'gravar'])->name('filmes.gravar');

Route::get('/filmes/apagar/{filmes}', [FilmesController::class, 'apagar'])->name('filmes.apagar');

Route::delete('/filmes/apagar/{filmes}', [FilmesController::class, 'deletar']);

Route::prefix('usuarios')->middleware('auth')->group(function() {
    Route::get('/', [UsuariosController::class, 'index'])->name('usuarios');

    Route::get('/inserir', [UsuariosController::class, 'create'])->name('usuarios.inserir');
    
    Route::post('/inserir', [UsuariosController::class, 'insert'])->name('usuarios.gravar');
    
    Route::get('/apagar/{usuario}', [UsuariosController::class, 'remove'])->name('usuarios.apagar');
});

Route::get('login', [UsuariosController::class, 'login'])->name('login');

Route::post('login', [UsuariosController::class, 'login']);

Route::get('logout', [UsuariosController::class, 'logout'])->name('logout');