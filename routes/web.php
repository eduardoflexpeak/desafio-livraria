<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@index');
Route::get('livro/{livro}', 'IndexController@livro')->name('detalhes.livro');

Auth::routes([
    'register' => false
]);

Route::prefix('restrito')->group(function () {
    Route::get('home', 'HomeController@index')->name('home');

    Route::namespace('Restrito')->name('restrito.')->group(function () {
        Route::resource('autors', 'AutorController');
        Route::resource('livros', 'LivroController');

        Route::get('lista-autores', 'AutorController@listaAutores')->name('lista.autores');
    });
});