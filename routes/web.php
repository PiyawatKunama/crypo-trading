<?php

use App\Http\Controllers\CryptoController;
use App\Http\Controllers\FiatController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

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

Route::get('/', [PostController::class, 'index']);
// Route::get('/', [PostController::class,'getPosts']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::get('add-crypto', [CryptoController::class, 'view']);
Route::post('add-crypto', [CryptoController::class, 'create']);

Route::get('add-fiat', [FiatController::class, 'view']);
Route::post('add-fiat', [FiatController::class, 'create']);

Route::get('post-buy', [PostController::class, 'view_post_buy']);
Route::post('post-buy', [PostController::class, 'create']);


Route::get('post-sell', [PostController::class, 'view_post_sell']);
Route::post('post-sell', [PostController::class, 'create_sell']);

Route::get('bill', [PostController::class, 'bill']);
Route::post('bill', [PostController::class, 'bill']);

// Route::get('posts/{post}', function ($slug) {

//     return view('post', ['post' => Post::findorFail($slug)]);
// });
