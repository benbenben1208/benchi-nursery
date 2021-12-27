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
    //ユーザー編集 今は画像のみの編集なので、patchかなーと思うけど、最終的にはputで飛ばすことになるかなという予想。
    Route::match(['put', 'patch'], '/{user}/edit', [UserController::class, 'update'])->name('user.edit');
    Route::get('/top', [PagesController::class, 'top'])->name('pages.top');

    //パスワードリセット
    Route::post('/password/request', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::post('/password/reset', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
    //Route::prefix('joboffer')内のグループにはjobofferがURIに付きます。
    Route::prefix('/joboffer')->group(function () {
        Route::get('/conditions', [JobSearchesController::class, 'getConditions'])->name('joboffer.conditions');
        Route::get('/search', [JobSearchesController::class, 'searchJobOffers'])->name('joboffer.search');
        Route::get('/pickupJoboffer',[FrikuJobsController::class, 'pickupJobAll'])->name('pickupJoboffers.all');
        Route::get('/{corporationJoboffer}', [JobsController::class, 'showJoboffer'])->name('pickup.show');


    });
    Route::prefix('/friku')->group(function () {
        Route::get('/joboffer/show/{frikuJoboffer}',[FrikuJobsController::class, 'show'])->name('friku.joboffers.show');
        Route::get('/{frikuCompany}/joboffers/pickup',[FrikuJobsController::class, 'pickUpCompanyJoboffers'])->name('friku.company.pickupJoboffers');
        Route::get('/{frikuCompany}/joboffers/feature',[FrikuJobsController::class, 'featureCompanyJoboffers'])->name('friku.company.featureJoboffers');
    });

    Route::get('/joboffers/om',[JobsController::class, 'omJobAll'])->name('omJoboffers.all');

    Route::group(['middleware' => ['auth:users']], function () {
        Route::get('/', [UserController::class, 'getAuthUser']);
        Route::put('/joboffer/favorites', [FavoritesController::class, 'omFavorites'])
            ->name('/joboffer.favorites.attach');
        Route::delete('/joboffer/favorites', [FavoritesController::class, 'omUnfavorites'])
            ->name('/joboffer.favorites.detach');

        Route::put('/frikuJoboffer/{frikuJoboffer}/favorites/', [FrikuFavoritesController::class, 'frikuFavorites'])
            ->name('friku_joboffer.favorites.attach');
        Route::delete('/frikuJoboffer/{frikuJoboffer}/favorites/', [FrikuFavoritesController::class, 'frikuUnfavorite'])
            ->name('friku_joboffer.favorites.detach');
        // Route::get('joboffer/om/apply/{corporationJoboffer}', [JobsController::class, 'applyOm'])->name('joboffer.om.apply');
        Route::post('joboffer/om/apply/{corporationJoboffer}/', [JobsController::class, 'applyOmOriginalJoboffer'])->name('joboffer.omOriginal.apply');
    });
});
//企業用ルート
Route::prefix('staff')->group(function () {

    Route::post('/register', [StaffController::class, 'register']);
    Route::group(['middleware' => ['auth:staffs']], function () {
        Route::get('/', [StaffController::class, 'getAuthUser']);
        Route::get('/user/search', [UserSearchController::class, 'search']);
        Route::get('/user/offer', [SendOfferController::class, 'sendOffer']);
    });
});
//管理者用ルート
Route::prefix('admin')->group(function () {
    Route::post('/register', [AdminController::class, 'register']);
    Route::group(['middleware' => ['auth:admins']], function () {
        Route::get('/', function (Request $request) {
            return $request->user();
        });
    });
});
