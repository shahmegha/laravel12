<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:ADMIN']], function() {
    Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
    Route::get('/users/add', [App\Http\Controllers\UsersController::class, 'add'])->name('users.add');
    Route::post('/users/add', [App\Http\Controllers\UsersController::class, 'store'])->name('users.store');
    Route::get('/users/edit/{id}', [App\Http\Controllers\UsersController::class, 'add'])->name('users.edit');
    Route::delete('/users/destroy/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.destroy');
});