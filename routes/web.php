<?php

use App\Http\Controllers\Admin\Blog\CategoryController;
use App\Http\Controllers\Admin\Blog\PostController;
use App\Http\Controllers\Admin\Blog\TagController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\BlogSearchController;
use App\Http\Controllers\BlogTagController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Password;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

Route::post('/contact-form', [IndexController::class, 'contactForm'])->name('contact-form.process');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogPostController::class, 'index'])->name('index');
    Route::get('article/{slug}', [BlogPostController::class, 'show'])->name('page');
    Route::get('category/{slug}', [BlogCategoryController::class, 'show'])->name('category');
    Route::get('tag/{slug}', [BlogTagController::class, 'show'])->name('tag');
    Route::get('search', [BlogSearchController::class, 'index'])->name('search');
    Route::post('article/{id}', [BlogPostController::class, 'comment'])->middleware('auth')->name('comment');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function () {
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
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.process');
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
    Route::view('/forgot-password', 'auth.forgot-password')->name('password.request');
    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                    ? back()->with(['status' => __($status), 'message' => 'Ссылка для сброса пароля отправлена на указанный Вами email'])
                    : back()->withErrors(['email' => __($status)]);
    })->name('password.email');
    Route::get('/reset-password/{token}', function (string $token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');
    Route::post('/reset-password', function (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => [__($status)]]);
    })->name('password.update');
});

Route::group(['middleware' => 'auth'], function() {
   Route::view('/email/verify', 'auth.verify-email',
        ['message' => 'На Ваш email была выслана ссылка для подтверждения!'])
        ->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();

        return redirect()->route('home');
    })->middleware('signed')->name('verification.verify');
    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'На Ваш email была выслана ссылка для подтверждения!');
    })->middleware('throttle:6,1')->name('verification.send');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::group(['middleware' => 'admin'], function () {
    Route::any('/ckfinder/connector', '\CKSource\CKFinderBridge\Controller\CKFinderController@requestAction')
        ->name('ckfinder_connector');

    Route::any('/ckfinder/browser', '\CKSource\CKFinderBridge\Controller\CKFinderController@browserAction')
        ->name('ckfinder_browser');

    Route::any('/ckfinder/examples/{example?}', '\CKSource\CKFinderBridge\Controller\CKFinderController@examplesAction')
    ->name('ckfinder_examples');
});
