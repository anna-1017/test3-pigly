<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PiglyUserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Laravel\Fortify\Fortify;

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


Route::get('/register/step1', [PiglyUserController::class, 'register'])->name('register.step1');

Route::post('/register/step1', [PiglyUserController::class, 'storeStep1']);

Route::get('/register/step2', [PiglyUserController::class, 'step2'])->name('register.step2');

Route::post('/register/step2', [PiglyUserController::class, 'storeStep2']);


Route::get('/login', [PiglyUserController::class, 'showLoginForm'])->name('login');

Route::post('/login', [PiglyUserController::class, 'login'])->name('login');

Route::get('/weight_logs/create', [PiglyUserController::class, 'add']);


Route::get('/weight_logs', [PiglyUserController::class, 'showAdminPage'])->name('weight_logs');

Route::get('/weight_logs/{weightLogId}/edit', [PiglyUserController::class, 'edit'])->name('weight_logs.edit');

Route::put('/weight_logs/{weightLogId}/update', [PiglyUserController::class, 'update'])->name('weight_logs.update');

Route::get('/weight_logs/search', [PiglyUserController::class, 'search']);


Route::middleware('auth')->group(function(){
    Route::get('/weight_logs/goal_setting',  [PiglyUserController::class, 'targetUpdate']);
    Route::post('/weight_logs/goal_setting', [PiglyUserController::class, 'storeGoalSetting']);
    Route::post('/logout', [PiglyUserController::class, 'logout'])->name('logout');
});

