<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Session\Session;

use App\Http\Controllers\API\USER\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\API\FeedbackController;
use App\Http\Controllers\API\LiveVideoController;
use App\Http\Controllers\API\ApiTempleController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['middleware' => 'api'], function () {
    Route::post('login', [UserController::class, 'loginUser']);
    Route::post('user/add', [UserController::class, 'addUser']);
    Route::post('getProfile', [UserController::class, 'getProfile']);
    Route::post('refresh', [UserController::class, 'refreshToken']);
    Route::post('user/update/{id}', [UserController::class, 'updateUser'])->name('user.update');
    Route::post('password/reset', [UserController::class, 'forgotPassword']);
    Route::post('userStatus/update/{id}', [UserController::class, 'activeUser']);
    Route::post('user/delete', [UserController::class, 'deleteUser'])->name('api.deleteUser');
    Route::post('user/updateProfile', [UserController::class, 'updateUserProfile']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('validateSession', [AstrologerController::class, 'validateSession']);
    Route::post('validateSessionForAstrologer', [AstrologerController::class, 'validateSessionForAstrologer']);
    Route::post('live-arti', [LiveVideoController::class, 'liveArti']);
    Route::post('arti-song', [LiveVideoController::class, 'artiSong']);
    Route::post('temple-list', [ApiTempleController::class, 'templeList']);
});


Route::post('privacy-policy', [DashboardController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::post('tnc', [DashboardController::class, 'termscond'])->name('termscond');
// Route::get('/privacy-policy-url', function () {
//     return view('page.privacy-policy');
// })->name('privacy.policy.url');
Route::post('forgot-password', [UserController::class, 'forgotPassword']);
Route::post('verify-otp', [UserController::class, 'verifyOTP']);
Route::get('feedback', [FeedbackController::class, 'getAppFeedback'])->name('feedback');
