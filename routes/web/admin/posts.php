<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::middleware('auth')->group(function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('createPost', [AdminController::class, 'create'])->name('createPost');
    Route::put('storePost', [AdminController::class, 'store'])->name('storePost');
    Route::get('allPosts', [AdminController::class, 'display'])->name('allPosts');
    Route::get('/admin/post/edit/{post}', [AdminController::class, 'edit'])->name('editPost');
    Route::patch('/admin/post/update/{post}', [AdminController::class, 'update'])->name('updatePost');
    Route::delete('/admin/post/{post}', [AdminController::class, 'destroy'])->name('destroyPost');
});
