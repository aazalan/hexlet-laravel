<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ArticleController;
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
});

Route::get('about', [PageController::class, 'about'])
    ->name('about');

Route::get('articles', [ArticleController::class, 'index'])
    ->name('articles.index');

Route::get('articles/create', [ArticleController::class, 'create'])
    ->name('article.create');

Route::get('articles/{id}', [ArticleController::class, 'show'])
    ->name('article.show');

Route::get('articles/{id}/edit', [ArticleController::class, 'edit'])
    ->name('article.edit');

Route::post('articles', [ArticleController::class, 'store'])
    ->name('article.store');
