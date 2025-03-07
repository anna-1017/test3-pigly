<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PiglyUserController;

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

// 画面表示
Route::get('/register/step1', [PiglyUserController::class, 'register'])->name('register.step1');
// フォーム送信、データ保存
Route::post('/register/step1', [PiglyUserController::class, 'storeStep1']);

// 登録完了後、step2にリダイレクト
Route::get('/register/step2', [PiglyUserController::class, 'step2'])->name('register.step2');
// step2のフォーム送信、データ保存
Route::post('/register/step2', [PiglyUserController::class, 'storeStep2']);

//体重管理画面
Route::get('/weight_logs', [PiglyUserController::class, 'admin'])->name('weight_logs');

//ログイン画面表示。Fortify がログインページを自動的に提供するので不要
//Route::get('/login', [PiglyUserController::class, 'login']);