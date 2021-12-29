<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\AdminController;
use App\Http\Controllers\Api\Staff\StaffController;
use App\Http\Controllers\Api\User\OwnedMaker\FavoritesController;
use App\Http\Controllers\Api\User\Friku\FrikuFavoritesController;
use App\Http\Controllers\Api\User\UserController;
use App\Http\Controllers\Api\User\OwnedMaker\JobsController;
use App\Http\Controllers\Api\User\PagesController;
use App\Http\Controllers\Api\User\ForgotPasswordController;
use App\Http\Controllers\Api\User\ResetPasswordController;
use App\Http\Controllers\Api\Staff\SendOfferController;
use App\Http\Controllers\Api\Staff\UserSearchController;
use App\Http\Controllers\Api\User\Friku\FrikuJobsController;
use App\Http\Controllers\Api\User\JobSearchesController;
use App\Http\Controllers\Api\User\StripeController;
use App\Models\FrikuJoboffer;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//ユーザー側ルート

//Note: Route::prefix('user')内のグループにはURIにuserが付きます。
Route::prefix('user')->group(function () {
    Route::post('/register', [UserController::class, 'register']);
    Route::get('/show/{email}', [UserController::class, 'show'])->name('user.show');



    //パスワードリセット
    Route::post('/password/request', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::post('/password/reset', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
    //Route::prefix('joboffer')内のグループにはjobofferがURIに付きます。


});
Route::prefix('user')->name('stripe.')->group(function () {
    Route::get('checkout', [StripeController::class, 'checkout'])->name('checkout');
    Route::get('/subscription', [StripeController::class, 'subscription'])->name('subscription');
    Route::post('/subscription/afterpay', [StripeController::class, 'afterpay'])->name('afterpay');
});
