<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FilemController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\PagesController;
use App\Models\genre;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
Route::middleware(['auth'])->group(function () {
    Route::controller(FilemController::class)->group(function () {
        Route::get('/filem', 'index');
        Route::get('/filem-create', 'create');
        Route::post('/filem-create', 'store')->name('filem.perform');
        Route::get('/filem-edit/{id}', 'edit')->name('filem.edit');
        Route::put('/filem-edit/{id}', 'update')->name('filem.update');
        Route::delete('filem/{id}', 'destroy')->name('filem.delete');
    });
    Route::controller(GenreController::class)->group(function () {
        Route::get('/genre', 'index');
        Route::post('/genre', 'store')->name('genre.perform');
        Route::get('/genre-edit/{id}', 'edit')->name('genre.edit');
        Route::put('/genre-edit/{id}', 'update')->name('genre.update');
        Route::delete('genre/{id}', 'destroy')->name('genre.delete');
    });
});
Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/{id}', 'detail')->name('detail');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
