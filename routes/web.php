<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\FamilyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('sign-in', [AuthController::class, 'loginPage'])->name('page.sign.in');

Route::get('login/{email}', [AuthController::class, 'processLogin'])->middleware('signed')->name('login:store');
Route::redirect('login', 'sign-in');
Route::post('login', [AuthController::class, 'login'])->name('login');

// Authorized and verified user only
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('family', [PageController::class, 'family'])->name('page.family');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin related routes
Route::middleware(['auth', 'verified', 'is.admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('family', FamilyController::class);
});
