<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Session\Session;

use App\Http\Controllers\API\USER\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\API\FeedbackController;
use App\Http\Controllers\API\LiveVideoController;
use App\Http\Controllers\API\ApiTempleController;
use App\Http\Controllers\API\ApiController;
use App\Http\Controllers\API\USER\DailyHoroscopeController;
// use App\Http\Controllers\API\User\DailyHoroscopeController;
use App\Http\Controllers\API\USER\HoroController;
use App\Http\Controllers\API\USER\KundaliController;
use App\Http\Controllers\API\USER\KundaliMatchingController;


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
    Route::post('forgot-password', [UserController::class, 'forgotPassword']);
    Route::post('verify-otp', [UserController::class, 'verifyOTP']);
    Route::post('reset-password', [UserController::class, 'resetPassword']);

    Route::post('user/add', [UserController::class, 'addUser']);
    Route::post('getProfile', [UserController::class, 'getProfile']);
    Route::post('refresh', [UserController::class, 'refreshToken']);
    // Route::post('user/update/{id}', [UserController::class, 'updateUser']);
    Route::post('userupdate', [UserController::class, 'updateUser']);
    Route::post('password/reset', [UserController::class, 'forgotPassword']);
    Route::post('userStatus/update/{id}', [UserController::class, 'activeUser']);
    Route::post('user/delete', [UserController::class, 'deleteUser'])->name('api.deleteUser');
    Route::post('user/updateProfile', [UserController::class, 'updateUserProfile']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('validateSession', [AstrologerController::class, 'validateSession']);
    Route::post('validateSessionForAstrologer', [AstrologerController::class, 'validateSessionForAstrologer']);
    Route::post('live-arti', [LiveVideoController::class, 'liveArti']);
    Route::post('live-darshan', [LiveVideoController::class, 'liveDarshan']);
    
    Route::post('arti-song', [LiveVideoController::class, 'artiSong']);
    Route::post('temple-list', [ApiTempleController::class, 'templeList']);
    Route::post('sign-up', [UserController::class, 'signUp']);

    //dailyHoroscope
    Route::post('getDailyHoroscope', [DailyHoroscopeController::class, 'getDailyHoroscope']);
    Route::post('getDailyHoroscopeInsightForAdmin', [DailyHoroscopeController::class, 'getDailyHoroscopeInsightForAdmin']);
    Route::post('getHoroscope', [DailyHoroscopeController::class, 'getHoroscope']);
    // Route::post('generateToken', [TokenGeneratorController::class, 'generateToken']);
    // Route::post('generateRtcToken', [TokenGeneratorController::class, 'generateRtcToken'])->name('api.generateRtcToken');
    Route::post('addHoroscopeFeedback', [DailyHoroscopeController::class, 'addHoroscopeFeedback']);
    //cDemo

    // New
Route::post('kundali/addnew', [KundaliController::class, 'addKundaliNew'])->name('api.addKundaliNew');
Route::post('kundali/getKundaliReport', [KundaliMatchingController::class, 'getKundaliReport'])->name('api.getKundaliReport');
//Kundali
Route::post('kundali/add', [KundaliController::class, 'addKundali'])->name('api.addKundali');
Route::post('kundali/update/{id}', [KundaliController::class, 'updateKundali']);
Route::post('pdf/price', [KundaliController::class, 'getKundaliPrice']);
Route::post('getkundali', [KundaliController::class, 'getKundalis']);
Route::post('kundali/delete', [KundaliController::class, 'deleteKundali'])->name('api.deleteKundali');
Route::post('kundali/get/{id}', [KundaliController::class, 'getKundali']);
Route::post('kundali/show/{id}', [KundaliController::class, 'kundaliShow']);
Route::post('kundali/removeFromTrackPlanet', [KundaliController::class, 'removeFromTrackPlanet']);
Route::post('kundali/addForTrackPlanet', [KundaliController::class, 'addForTrackPlanet']);
Route::post('kundali/getForTrackPlanet', [KundaliController::class, 'getForTrackPlanet']);
Route::post('get/panchang', [KundaliController::class, 'getPanchang']);

// banner list


});
Route::get('banner_list', [ApiController::class, 'bannerList']);

Route::post('privacy-policy', [DashboardController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::post('tnc', [DashboardController::class, 'termscond'])->name('termscond');
// Route::get('/privacy-policy-url', function () {
//     return view('page.privacy-policy');
// })->name('privacy.policy.url');

Route::get('feedback', [FeedbackController::class, 'getAppFeedback'])->name('feedback');
Route::post('/feedback/add', [FeedbackController::class, 'store']);

//Kundali matching
Route::post('KundaliMatching/add', [KundaliMatchingController::class, 'addKundaliMatching']);
Route::post('KundaliMatchinglist', [KundaliMatchingController::class, 'kundaliMatchingData']);
Route::post('KundaliMatching/report', [KundaliMatchingController::class, 'getMatchReport']);
Route::post('getKundaliReportById', [KundaliController::class, 'getKundaliReportById'])->name('api.getKundaliReportById');
