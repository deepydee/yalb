<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Blog\CategoryController;
use App\Http\Controllers\Admin\Blog\CommentsController;
use App\Http\Controllers\Admin\Blog\PostController;
use App\Http\Controllers\Admin\Blog\TagController;
use App\Http\Controllers\Admin\Catalog\AttributeController;
use App\Http\Controllers\Admin\Catalog\CategoryController as CatalogCategoryController;
use App\Http\Controllers\Admin\Catalog\ProductController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\FormMessageController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ImportController;

Route::view('/', 'admin.index')->name('index');

Route::post('images', [ImageController::class, 'store'])->name('images.store');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::resource('/categories', CategoryController::class)
        ->except('show');
    Route::resource('/tags', TagController::class)
        ->except('show');
    Route::resource('/posts', PostController::class)
        ->except('show');

    Route::prefix('comments')->name('comments.')->group(function() {
        Route::get('/', [CommentsController::class, 'showComments'])->name('index');
        Route::get('message/{blog_post_comment}', [CommentsController::class, 'showComment'])->name('single');
        Route::delete('message/{blog_post_comment}', [CommentsController::class, 'deleteComment'])->name('destroy');
        Route::get('make-comment-public/{blog_post_comment}', [CommentsController::class, 'toggleCommentPublic'])->name('publish');
        Route::get('make-comment-unread/{blog_post_comment}', [CommentsController::class, 'makeCommentUnread'])->name('unread');
    });
});

Route::prefix('catalog')->name('catalog.')->group(function () {
    Route::get('/categories/create/{category?}', [CatalogCategoryController::class, 'create'])
        ->name('categories.create');
    Route::resource('/categories', CatalogCategoryController::class)
        ->except('show');
    Route::resource('/attributes', AttributeController::class)
        ->except('show');
    Route::resource('/products', ProductController::class)
        ->except('show');
});

Route::prefix('messages')->group(function() {
    Route::get('/', [FormMessageController::class, 'showMessages'])->name('messages.index');
    Route::get('message/{id}', [FormMessageController::class, 'showMessage'])->name('messages.single');
    Route::delete('message/{id}', [FormMessageController::class, 'deleteMessage'])->name('message.destroy');
    Route::get('make-message-unread/{id}', [FormMessageController::class, 'makeMessageUnread'])->name('message.unread');
});

// Route::get('export', [ExportController::class, 'export'])->name('export');
// Route::post('import', [ImportController::class, 'import'])->name('import');
