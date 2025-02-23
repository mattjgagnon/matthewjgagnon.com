<?php

use App\Http\Controllers\Admin\AdminChapterController;
use App\Http\Controllers\Admin\BookController as AdminBookController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\InquiryController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

// ✅ PUBLIC Routes
Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/{book:slug}', [BookController::class, 'show'])->name('books.show');
Route::get('/chapters', [ChapterController::class, 'index'])->name('chapters.index');
//Route::get('/chapters/{chapter}', [ChapterController::class, 'show'])->name('chapters.show');
Route::get('/inquiry', [InquiryController::class, 'create'])->name('inquiries.create');
Route::post('/inquiry', [InquiryController::class, 'store'])->name('inquiries.store');
Route::get('/{book:slug}/chapter/{chapter}/page{page?}', [ChapterController::class, 'show'])->name('chapters.show');
Route::get('/family-values', function () {
    return view('pages.family-values');
})->name('pages.family-values');

Route::get('/', function () {
    return view('welcome');
})->name('home');

// ✅ ADMIN Routes (prefix them with /admin to avoid conflicts)
Route::middleware(['auth', AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::resource('books', AdminBookController::class)
        ->parameters(['books' => 'book:slug'])
        ->names('admin.books');
    Route::resource('/chapters', AdminChapterController::class)->names('admin.chapters');
    Route::get('/inquiries', [AdminInquiryController::class, 'index'])->name('admin.inquiries.index');
    Route::get('/inquiries/{inquiry}', [AdminInquiryController::class, 'show'])->name('admin.inquiries.show');
    Route::delete('/inquiries/{inquiry}', [AdminInquiryController::class, 'destroy'])->name('admin.inquiries.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
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
