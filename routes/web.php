<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('/contacts', App\Http\Controllers\ContactController::class);
    Route::resource('/users', App\Http\Controllers\UserController::class);
});
