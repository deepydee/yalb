<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Blog\CategoryController;
use App\Http\Controllers\Admin\Blog\PostController;
use App\Http\Controllers\Admin\Blog\TagController;
use App\Http\Controllers\Admin\MainController;

Route::get('/', [MainController::class, 'index'])->name('index');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/posts', PostController::class);
});

Route::prefix('messages')->group(function() {
    Route::get('/', [MainController::class, 'showMessages'])->name('messages.index');
    Route::get('message/{id}', [MainController::class, 'showMessage'])->name('messages.single');
    Route::delete('message/{id}', [MainController::class, 'deleteMessage'])->name('message.destroy');
});
