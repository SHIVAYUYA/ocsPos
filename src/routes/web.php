<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProceedsController;
use App\Http\Controllers\StoreAdminController;
use App\Http\Controllers\ResisterController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProductAdminController;


// ホームページ
Route::get('/', function () {
    return view('auth.index');
});

// ログイン認証
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.auth');

// ログアウト
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ログイン画面
Route::get('/login', function () {
    return view('auth.index');
})->name('login');


Route::get('/user/resister', [ResisterController::class, 'index'])->name('user.resister');
Route::post('user/resister', [ResisterController::class, 'store']);

Route::get('/user/sales', [SalesController::class, 'index'])->name('user.sales');


// 管理者ページルーティング
Route::get('/admin/index', [AdminController::class, 'index'])->name('admin.index'); // 修正

// 店舗管理者ページルーティング
Route::get('/store', [StoreAdminController::class, 'index'])->name('admin.store.index');
Route::post('/admin/store/create', [StoreAdminController::class, 'store'])->name('admin.store.create');
Route::post('/admin/product/create', [ProductAdminController::class, 'store'])->name('admin.product.create');

// 売上画面
Route::get('/proceeds', [ProceedsController::class, 'index'])->name('proceeds.index');


