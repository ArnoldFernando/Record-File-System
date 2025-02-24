<?php

use App\Http\Controllers\File\AllFileController;
use App\Http\Controllers\File\FileCategoryController;
use App\Http\Controllers\File\FileController;
use App\Http\Controllers\File\ProcessFileController;
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
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('file', FileController::class);
    Route::resource('file-category', FileCategoryController::class);
    Route::resource('all-file', AllFileController::class);
    Route::get('all-file/view/{id}', [AllFileController::class, 'viewFile'])->name('all-file.view');

    Route::get('/files/download/{id}', [FileController::class, 'downloadFile'])->name('files.download');

    Route::post('/file/update-status/{fileId}', [ProcessFileController::class, 'updateStatus'])->name('file.update-status');
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
