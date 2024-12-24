<?php

use App\Http\Controllers\Admin\PhotoGalleryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\VideoGalleryController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

Route::get('users', [\App\Http\Controllers\Admin\UserController::class, 'index'])->name('users.index');

Route::get('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('profile.show');
Route::put('profile', [\App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('profile.update');

Route::resource('posts', PostController::class)->except('show');

Route::prefix('gallery')->group(function () {
    Route::resource('photo', PhotoGalleryController::class)->except('show');
    Route::resource('video', VideoGalleryController::class)->except('show');
});

Route::get('setting', [\App\Http\Controllers\Admin\SettingController::class, 'show'])->name('setting.show');
Route::put('setting', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('setting.update');

Route::get('contacts', [\App\Http\Controllers\Admin\ContactController::class, 'index'])->name('contacts.index');
Route::delete('contacts/{id}', [\App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('contacts.destroy');
