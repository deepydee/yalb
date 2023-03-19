<?php

use App\Http\Controllers\PodcastController;
use App\Mail\HelloMail;
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
    // app('log')->info('Welcome');
    return view('welcome');
});

Route::get('/hello', function () {
    return 'Hello World!';
});

Route::get('/hi', function () {
    Mail::to('a@b.com')->send(new HelloMail());
    return 'Hi';
});

// Route::get('/podcasts', [PodcastController::class, 'index']);
