<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Blog\CategoryController;
use App\Http\Controllers\Admin\Blog\CommentsController;
use App\Http\Controllers\Admin\Blog\PostController;
use App\Http\Controllers\Admin\Blog\TagController;
use App\Http\Controllers\Admin\FormMessageController;

Route::view('/', 'admin.index')->name('index');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/posts', PostController::class);

    Route::prefix('comments')->name('comments.')->group(function() {
        Route::get('/', [CommentsController::class, 'showComments'])->name('index');
        Route::get('message/{id}', [CommentsController::class, 'showComment'])->name('single');
        Route::delete('message/{id}', [CommentsController::class, 'deleteComment'])->name('destroy');
        Route::get('make-comment-public/{id}', [CommentsController::class, 'toggleCommentPublic'])->name('publish');
        Route::get('make-comment-unread/{id}', [CommentsController::class, 'makeCommentUnread'])->name('unread');
    });
});

Route::prefix('messages')->group(function() {
    Route::get('/', [FormMessageController::class, 'showMessages'])->name('messages.index');
    Route::get('message/{id}', [FormMessageController::class, 'showMessage'])->name('messages.single');
    Route::delete('message/{id}', [FormMessageController::class, 'deleteMessage'])->name('message.destroy');
    Route::get('make-message-unread/{id}', [FormMessageController::class, 'makeMessageUnread'])->name('message.unread');
});
