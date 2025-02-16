<?php

use App\Http\Controllers\Admin\AdminChapterController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

// ✅ PUBLIC Routes
Route::get('/chapters', [ChapterController::class, 'index'])->name('chapters.index');
Route::get('/chapters/{chapter}', [ChapterController::class, 'show'])->name('chapters.show');

Route::get('/', function () {
    return view('welcome');
});

// ✅ ADMIN Routes (prefix them with /admin to avoid conflicts)
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::resource('chapters', AdminChapterController::class)->names('admin.chapters');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
