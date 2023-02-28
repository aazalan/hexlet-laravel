<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleCommentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('main');

Route::get('about', [PageController::class, 'about'])
    ->name('about');

Route::resource('articles', ArticleController::class);

Route::resource('articles.comments', ArticleCommentController::class);

Route::name('user.')->group(function() {
    Route::view('/private', 'private')->middleware('auth')->name('private');

    Route::get('/login', [LoginController::class, 'show'])->name('login');

    Route::post('/login', [LoginController::class, 'login']);

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/registration', [RegistrationController::class, 'show'])->name('registration');

    Route::post('/registration', [RegistrationController::class, 'create']);
});