<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\UserContentController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// Shared dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', RoleMiddleware::class . ':user'])->group(function () {
    Route::view('/user/dashboard', 'user.dashboard')->name('user.dashboard');
});

Route::middleware(['auth', RoleMiddleware::class . ':professional'])->group(function () {
    Route::view('/professional/dashboard', 'professional.dashboard')->name('professional.dashboard');
});

Route::middleware(['auth', RoleMiddleware::class . ':admin'])->group(function () {
    Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');
});
// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::get('/content', [UserContentController::class, 'index'])->name('user.content.index');
    Route::get('/content/{category}', [UserContentController::class, 'showCategory'])->name('user.content.category');
    Route::post('/content/{category}/{level}/submit', [UserContentController::class, 'submitRecording'])->name('user.content.submitRecording');
});

Route::get('/content/{category}/{level}', [UserContentController::class, 'showLevel'])->name('user.content.level');

// Admin Category CRUD
Route::get('/admin/categories', [AdminController::class, 'indexCategories'])->name('admin.categories.index');
Route::get('/admin/categories/create', [AdminController::class, 'createCategory'])->name('admin.categories.create');
Route::post('/admin/categories', [AdminController::class, 'storeCategory'])->name('admin.categories.store');
Route::get('/admin/categories/{id}/edit', [AdminController::class, 'editCategory'])->name('admin.categories.edit');
Route::put('/admin/categories/{id}', [AdminController::class, 'updateCategory'])->name('admin.categories.update');
Route::delete('/admin/categories/{id}', [AdminController::class, 'destroyCategory'])->name('admin.categories.destroy');

// Admin Level CRUD
Route::get('/admin/categories/{categoryId}/levels', [AdminController::class, 'indexLevels'])->name('admin.levels.index');
Route::get('/admin/categories/{categoryId}/levels/create', [AdminController::class, 'createLevel'])->name('admin.levels.create');
Route::post('/admin/categories/{categoryId}/levels', [AdminController::class, 'storeLevel'])->name('admin.levels.store');
Route::get('/admin/categories/{categoryId}/levels/{levelId}/edit', [AdminController::class, 'editLevel'])->name('admin.levels.edit');
Route::put('/admin/categories/{categoryId}/levels/{levelId}', [AdminController::class, 'updateLevel'])->name('admin.levels.update');
Route::delete('/admin/categories/{categoryId}/levels/{levelId}', [AdminController::class, 'destroyLevel'])->name('admin.levels.destroy');

// Admin Sound CRUD
Route::get('/admin/levels/{levelId}/sounds', [AdminController::class, 'indexSounds'])->name('admin.sounds.index');
Route::get('/admin/levels/{levelId}/sounds/create', [AdminController::class, 'createSound'])->name('admin.sounds.create');
Route::post('/admin/levels/{levelId}/sounds', [AdminController::class, 'storeSound'])->name('admin.sounds.store');
Route::delete('/admin/levels/{levelId}/sounds/{soundId}', [AdminController::class, 'destroySound'])->name('admin.sounds.destroy');
require __DIR__.'/auth.php';
