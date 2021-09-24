<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ProductsController;
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

//ログインフォーム表示
Route::get('/', [AuthController::class,'showLogin'])->name('showLogin');
//ログイン処理
Route::post('login',[AuthController::class, 'login'])->name('login');



//ログイン後の商品一覧画面表示
Route::get('login/products' , [ProductsController::class, 'showList'])->name('showList');


//新規登録画面を表示
Route::get('/login/sign_up', [AuthController::class,'showSignUp'])->name('sign_up');
//新規登録
Route::post('/login/register',[AuthController::class, 'exeRegister'])->name('register');



Route::get('/home', 'HomeController@index')->name('home');
