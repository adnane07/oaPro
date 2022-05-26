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
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\UserController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');



Route::get('/home', function () {
    return view('welcome');
});
Route::get('/gerer', function () {
    return view('gerer');
})->name('gerer');

Route::get('/dispo', function () {
    return view('dispo');
})->name('dispo');

Route::get('/pdf', function () {
    return view('pdf');
})->name('pdf');

Route::get('/annuler', function () {
    return view('annuler');
})->name('annuler');

Route::get('/admin', function () {
    return view('admin');
})->name('admin');
