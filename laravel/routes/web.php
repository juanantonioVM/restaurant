<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function (){
    // Ruta para la vista principal de administrador
    Route::get('admin', 'ProductController@admin')->name('admin.home');

    // Rutas para las operaciones CRUD de productos en el administrador
    Route::get('admin/productos', 'ProductController@verProductos')->name('admin.productos');
    Route::get('admin/productos/create', 'ProductController@create')->name('productos.create');
    Route::post('admin/productos', 'ProductController@store')->name('productos.store');
    Route::get('admin/productos/{producto}/edit', 'ProductController@edit')->name('productos.edit');
    Route::put('admin/productos/{producto}', 'ProductController@update')->name('productos.update');
    Route::delete('admin/productos/{producto}', 'ProductController@destroy')->name('productos.destroy');

    // Rutas para las operaciones CRUD de categorías en el administrador
    Route::get('admin/categorias', 'CategoryController@index')->name('categorias.index');
    Route::get('admin/categorias/crear', 'CategoryController@create')->name('categorias.create');
    Route::post('admin/categorias', 'CategoryController@store')->name('categorias.store');
    Route::get('admin/categorias/{categoria}/editar', 'CategoryController@edit')->name('categorias.edit');
    Route::put('admin/categorias/{categoria}', 'CategoryController@update')->name('categorias.update');
    Route::delete('admin/categorias/{categoria}', 'CategoryController@destroy')->name('categorias.destroy');

    // Rutas para las operaciones CRUD de anuncios en el administrador
    Route::get('admin/anuncios', 'AnuncioController@index')->name('anuncios.index');
    Route::get('admin/anuncios/create', 'AnuncioController@create')->name('anuncios.create');
    Route::post('admin/anuncios', 'AnuncioController@store')->name('anuncios.store');
    Route::get('admin/anuncios/{anuncio}/edit', 'AnuncioController@edit')->name('anuncios.edit');
    Route::put('admin/anuncios/{anuncio}', 'AnuncioController@update')->name('anuncios.update');
    Route::delete('admin/anuncios/{anuncio}', 'AnuncioController@destroy')->name('anuncios.destroy');

});

// Ruta para la vista pública del menú
Route::get('menu', 'CategoryController@vistaPubli')->name('menu.index');

// Ruta para enviar los anuncios por Telegram
Route::get('/activity', 'ProductController@updatedActivity');

Auth::routes();
