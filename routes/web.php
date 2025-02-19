<?php

use App\Http\Controllers\File\FileCategoryController;
use App\Http\Controllers\File\FileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'auth'])->name('home');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('file', FileController::class);
    Route::resource('file-category', FileCategoryController::class);
    Route::get('/files/download/{id}', [FileController::class, 'downloadFile'])->name('files.download');
});

Route::middleware(['auth', 'staff'])->group(function () {
    route::view('test', 'staff.file.index')->name('test');
});
