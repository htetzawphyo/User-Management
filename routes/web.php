<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('user_management.permissions'); 
})->name('permissions');

Route::get('/roles/list', function () {
    return view('user_management.roles.list'); 
})->name('roles.list');
Route::get('/roles/view', function () {
    return view('user_management.roles.view'); 
})->name('roles.view');

Route::get('/users/list', function () {
    return view('user_management.users.list'); 
})->name('users.list');
Route::get('/users/view', function () {
    return view('user_management.users.view'); 
})->name('users.view');
