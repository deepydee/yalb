<?php

use App\Http\Controllers\Admin\Blog\CategoryController as BlogCategoryController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\PodcastController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
//     Route::get('/', [MainController::class, 'index'])->name('index');
// });

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('index');

    Route::prefix('blog')->name('blog.')->group(function () {
        Route::resource('/categories', BlogCategoryController::class);
    });
});
