<?php

use App\Http\Controllers\File\FileCategoryController;
use App\Http\Controllers\File\FileController;
use App\Http\Controllers\FileStatusController;
use App\Http\Controllers\StaffFileController;
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
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'auth'])->name('home');

// admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('file', FileController::class);
    Route::resource('file-category', FileCategoryController::class);
    Route::get('/files/download/{id}', [FileController::class, 'downloadFile'])->name('files.download');
});

// staff routes
Route::middleware(['auth', 'staff'])->prefix('staff')->name('staff.')->group(function () {
    Route::resource('file', StaffFileController::class);
    Route::get('/file/view/{id}', [StaffFileController::class, 'viewFile'])->name('file.view');
    Route::get('/files/download/{id}', [StaffFileController::class, 'downloadFile'])->name('file.download');

    Route::get('/files/status/{status}', [FileStatusController::class, 'index'])
        ->whereIn('status', ['pending', 'approved', 'rejected', 'deleted'])
        ->name('files.status');
});
