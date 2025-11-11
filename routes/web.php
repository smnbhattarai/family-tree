<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\FamilyController;
use App\Http\Controllers\Admin\UserController;
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
    Route::get('family/{family}', [PageController::class, 'showFamily'])->name('page.family.show');
    Route::get('family/{family}/edit', [PageController::class, 'editFamily'])->name('page.family.edit');
    Route::put('family/{family}/update', [PageController::class, 'updateFamily'])->name('page.family.update');
    Route::get('search-family', [PageController::class, 'searchFamily'])->name('page.search.family');
    Route::post('api/search-family', [PageController::class, 'searchFamilyData'])->name('page.search.familyData');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin related routes
Route::middleware(['auth', 'verified', 'is.admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('family', FamilyController::class);
    Route::get('users', [UserController::class, 'users'])->name('page.users');
});
