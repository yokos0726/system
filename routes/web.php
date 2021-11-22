<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\Auth\LoginController;
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

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

//ログインフォーム表示
Route::get('/', [AuthController::class,'showLogin'])->name('showLogin');
//ログイン処理
Route::post('login',[AuthController::class, 'login'])->name('login');



//ユーザー新規登録画面を表示
Route::get('/login/sign_up', [AuthController::class,'showSignUp'])->name('sign_up');
//ユーザー新規登録処理
Route::post('/login/register',[AuthController::class, 'exeRegister'])->name('register');
//新規登録完了画面を表示
// Route::get('/login/register_comp', [AuthController::class,'showRegisterComp'])->name('register_comp');


//ログイン後の商品一覧画面表示
Route::get('/login/products' , [ProductsController::class, 'showList'])->name('showList');
//検索機能
Route::post('/serch',[ProductsController::class, 'serch'])->name('serch');
//詳細表示
Route::get('/product/{id}',[ProductsController::class, 'showDetail'])->name('showDetail');


//商品登録画面表示
Route::get('/products/create' , [ProductsController::class, 'showCreate'])->name('showCreate');
//商品登録
Route::post('/products/store' , [ProductsController::class, 'exeStore'])->name('exeStore');
//商品削除
Route::post('/products/delete/{id}' , [ProductsController::class, 'exeDelete'])->name('exeDelete');
//商品編集画面表示
Route::get('/products/edit/{id}' , [ProductsController::class, 'showEdit'])->name('showEdit');
//商品編集
Route::post('/products/update' , [ProductsController::class, 'exeUpdate'])->name('exeUpdate');

// Route::get('/home', 'HomeController@index')->name('home');


