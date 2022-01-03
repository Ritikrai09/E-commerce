<?php
namespace App\Http\Controllers;
use App\Http\Middleware\sellerAuthentication;
use Illuminate\Support\Facades\Route;
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

Route::get('/home',function(){
    return view('layouts.home');
})->name('home');

Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

Route::get('/users/{user:name}/posts', [UserPostController::class,'index'])->name('users.posts');

Route::get('/register', function(){return view('layouts.register');})->name('register');
Route::post('/register', [RegisterController::class,'store']);

Route::post('/logout', [logoutController::class,'store'])->name('logout');

Route::post('/login', [LoginController::class,'store']);
Route::get('/login', [LoginController::class,'index'])->name('login');

Route::get('/posts', [PostController::class,'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class,'show'])->name('layouts.show');
Route::post('/posts', [PostController::class,'store']);
Route::delete('/posts/{post}', [PostController::class,'destroy'])->name('posts.destroy');

Route::post('/posts/{post:id}/likes', [LikeController::class,'store'])->name('posts.likes');
Route::delete('/posts/{post:id}/likes', [LikeController::class,'destroy'])->name('posts.likes');

Route::get('/product', function () {
    return view('layouts.index');
});

///-------------------------------------------------------------------ecommerce----------------------------


Route::get('/seller/dashboard',[SellerController::class,'index'])->name('sellerdashboard')->middleware(['auth.seller']);
Route::get('/orders',function(){return view('layouts.ecommerce.order');})->name('orders');
Route::get('/products',function(){ return view('layouts.ecommerce.product');})->name('products');
Route::get('/category',[CategoryController::class,'index'])->name('category');
Route::post('/products', [ProductController::class,'store']);
Route::post('/category',[CategoryController::class,'store']);
Route::get('/products/Available',function(){ return view('layouts.ecommerce.productAvailable');})->name('productAvailable');
Route::get('/customers',function(){ return view('layouts.ecommerce.customer');})->name('customers');
Route::get('/report',function(){ return view('layouts.ecommerce.report');})->name('report');
Route::get('/billings',function(){ return view('layouts.ecommerce.bill');})->name('billings');
Route::post('/sellerlogout', [logoutController::class,'logoutSeller'])->name('logoutSeller');

Route::prefix('seller')->group(function(){
Route::get('/register',function(){ return view('layouts.ecommerce.sellerRegister');})->name('sellerRegister');
Route::post('/register',[SellerRegisterController::class,'store']);
Route::get('/login',function(){ return view('layouts.ecommerce.sellerLogin');})->name('sellerlogin');
Route::post('/login',[SellerLoginController::class,'store']);
});