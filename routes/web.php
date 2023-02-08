<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PermissionController;

Route::controller(RolesController::class)->group(function() {
    Route::get('/roles', 'index')->name('roles');
    Route::post('/roles/store', 'store')->name('roles.store');
    Route::get('/roles/{role}', 'edit')->name('roles.edit');
    Route::put('/roles/{role}', 'update')->name('roles.update');
    Route::delete('/roles/{role}', 'delete')->name('roles.delete');
});

Route::controller(UsersController::class)->group(function() {
    Route::get('/users', 'index')->name('users');
    Route::post('/users/store', 'store')->name('users.store');
    Route::get('/users/{role}', 'edit')->name('users.edit');
    Route::put('/users/{role}', 'update')->name('users.update');
    Route::delete('/users/{role}', 'delete')->name('users.delete');
});

Route::get('/', function () {
    return view('user_management.users.list'); 
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
