<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\BlogSearchController;
use App\Http\Controllers\BlogTagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [IndexController::class, 'index'])->name('home');

// Route::resource('products', ProductController::class);

Route::post('/contact-form', [IndexController::class, 'contactForm'])->name('contact-form.process');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogPostController::class, 'index'])->name('index');
    Route::get('article/{blog_post:slug}', [BlogPostController::class, 'show'])->name('page');
    Route::get('category/{blog_category:slug}', [BlogCategoryController::class, 'show'])->name('category');
    Route::get('tag/{blog_tag:slug}', [BlogTagController::class, 'show'])->name('tag');
    Route::get('search', [BlogSearchController::class, 'index'])->name('search');
    Route::post('article/{blog_post}', [BlogPostController::class, 'comment'])
        ->middleware('auth')->name('comment');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
    Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'forgot'])->name('password.email');
    Route::view('/reset-password/{token}', 'auth.reset-password')->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');
});

Route::group(['middleware' => 'auth'], function() {

    Route::get('/email/verify', [AuthController::class, 'showEmailVerificationForm'])
        ->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'processEmailVerification'])
        ->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', [AuthController::class, 'verifyEmail'])
        ->middleware('throttle:6,1')->name('verification.send');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/{category_path}/{product}', [ProductController::class, 'show'])
    ->where('category_path', '[a-zA-Z0-9/_-]+')
    ->where('product', '[0-9]+-[a-zA-Z0-9_-]+')
    ->name('products.show');

Route::get('/{path}', [CategoryController::class, 'show'])
    ->where('path', '[a-zA-Z0-9/_-]+')
    ->name('category.show');
