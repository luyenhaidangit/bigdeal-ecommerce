<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsCommentController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PageController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Guest
//Home
Route::get('/', [HomeController::class, 'index'])->name('home');

//News
Route::get('/news', [NewsController::class, 'guestIndex'])->name('guest.news');
Route::get('/news/{id}', [NewsController::class, 'guestShow'])->name('guest.news.show');
Route::get('/guest/like/{id}', [NewsController::class, 'guestLove'])->name('guest.news.love');

//NewsComment
Route::post('/news_comment', [NewsCommentController::class, 'guestStore'])->name('guest.news_comment.store');

//Faq
Route::get('/faq', [FaqController::class, 'guestIndex'])->name('guest.faq');

//Page
Route::get('/page/{slug}', [PageController::class, 'guestShow'])->name('guest.page.show');

Auth::routes();
