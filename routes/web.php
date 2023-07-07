<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NewsCommentController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CustomerController;


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
Route::get('/', [HomeController::class, 'index'])->name('guest.home');

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

//ProductCategory
Route::get('/product-category/{slug}', [ProductCategoryController::class, 'guestShow'])->name('guest.product_category.show');

//Product
Route::get('/product/{slug}', [ProductController::class, 'guestShow'])->name('guest.product.show');

//ProductReview
Route::post('/product-review', [ProductReviewController::class, 'guestStore'])->name('guest.product_review.store');

//Search
Route::get('/search', [SearchController::class, 'guestProduct'])->name('guest.search.product');

//Cart
Route::get('/cart', function () {
    return view('guest.cart.cart');
})->name('guest.cart');

//Checkout
Route::get('/checkout', function () {
    return view('guest.checkout.checkout');
})->name('guest.checkout');

//Customer
Route::get('/login', [CustomerController::class, 'guestLogin'])->name('guest.customer.login');
Route::post('/login', [CustomerController::class, 'guestPostLogin'])->name('guest.customer.login.post');
Route::get('/register', [CustomerController::class, 'guestRegister'])->name('guest.customer.register.post');
Route::post('/register', [CustomerController::class, 'guestPostRegister'])->name('guest.customer.register');
Route::get('/customer/active/{email}', [CustomerController::class, 'guestVerify'])->name('guest.customer.active');
Route::get('/forget-password', [CustomerController::class, 'guestForgetPassword'])->name('guest.customer.forget_password');
Route::post('/forget-password', [CustomerController::class, 'guestPostForgetPassword'])->name('guest.customer.forget_password.post');
Route::get('/customer/reset-password', [CustomerController::class, 'guestResetPassword'])->name('guest.customer.reset_password');
Route::post('/customer/reset-password', [CustomerController::class, 'guestPostResetPassword'])->name('guest.customer.reset_password.post');

