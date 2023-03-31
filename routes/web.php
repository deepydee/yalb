<?php

use App\Http\Controllers\Admin\Blog\CategoryController;
use App\Http\Controllers\Admin\Blog\PostController;
use App\Http\Controllers\Admin\Blog\TagController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\BlogSearchController;
use App\Http\Controllers\BlogTagController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
    return view('index');
})->name('home');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogPostController::class, 'index'])->name('index');
    Route::get('article/{slug}', [BlogPostController::class, 'show'])->name('page');
    Route::get('category/{slug}', [BlogCategoryController::class, 'show'])->name('category');
    Route::get('tag/{slug}', [BlogTagController::class, 'show'])->name('tag');
    Route::get('search', [BlogSearchController::class, 'index'])->name('search');
});


// Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
//     Route::get('/', [MainController::class, 'index'])->name('index');
// });

Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
    Route::get('/', [MainController::class, 'index'])->name('index');

    Route::prefix('blog')->name('blog.')->group(function () {
        Route::resource('/categories', CategoryController::class);
    });

    Route::prefix('blog')->name('blog.')->group(function () {
        Route::resource('/tags', TagController::class);
    });

    Route::prefix('blog')->name('blog.')->group(function () {
        Route::resource('/posts', PostController::class);
    });
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [UserController::class, 'create'])->name('register.create');
    Route::post('/register', [UserController::class, 'store'])->name('register.store');
    Route::get('/login', [UserController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

Route::get('/email/verify', function () {
    return view('user.verify-email')->with('message', 'На Ваш email была выслана ссылка для подтверждения!');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'На Ваш email была выслана ссылка для подтверждения!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/logout', [UserController::class, 'logout'])->name('logout')
                                                        ->middleware('auth');

Route::group(['middleware' => 'admin'], function () {
    Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
        ->name('ckfinder_connector');

    Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
        ->name('ckfinder_browser');

    Route::any('/ckfinder/examples/{example?}', '\CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')
    ->name('ckfinder_examples');
});
