<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['web', 'auth']], function () {
    Route::resource('/contacts', App\Http\Controllers\ContactController::class);
    Route::get('/trashed', [App\Http\Controllers\ContactController::class, 'trashed'])->name('trashed');
    Route::delete('/forceDelete/{id}', [App\Http\Controllers\ContactController::class, 'forceDelete'])->name('forceDelete');
    Route::get('/restore/{id}', [App\Http\Controllers\ContactController::class, 'restore'])->name('restore');
    Route::resource('/users', App\Http\Controllers\UserController::class);
});
