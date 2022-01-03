<?php

use App\Http\Controllers\Api\Staff\StaffController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Api\Admin\AdminController;
use App\Http\Controllers\Api\User\StripeController;

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

//ユーザーログイン、ログアウト
Route::post('api/user/login', [UserController::class, 'login']);
Route::post('api/user/logout', [UserController::class, 'logout'])->middleware('auth:users');
//管理者ログイン、ログアウト
Route::post('api/admin/login', [AdminController::class, 'login']);
Route::post('api/admin/logout', [AdminController::class, 'logout'])->middleware('auth:admins');

//企業担当者ログイン、ログアウト
Route::post('api/staff/login', [StaffController::class, 'login']);
Route::post('api/staff/logout', [StaffController::class, 'logout'])->middleware('auth:staffs');


Route::post('afterpay/test', [StripeController::class, 'afterpay'])->name('afterpay.test');

