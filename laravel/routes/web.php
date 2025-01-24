<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function (){
    Route::get('admin', 'ProductController@admin')->name('admin.home');
});

Route::get('menu', 'ProductController@index')->name('menu.index');

Auth::routes();
