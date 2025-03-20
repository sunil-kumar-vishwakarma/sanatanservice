<?php

// use App\Http\Controllers\Admin\ArtiController as AdminArtiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AstrologerController;
use App\Http\Controllers\HoroscopeController;
use App\Http\Controllers\ArtiController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\TempleController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PageManagementController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\frontend\HomeController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\GeneralSettingController;

// frontent route

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return "Cache cleared successfully!";
});



Route::get('/storage-link', function () {
    Artisan::call('storage:link');
    return 'Storage link created successfully!';
});

Route::get('/', [HomeController::class, 'home'])->name('front.home');
Route::get('/talkastrologer', [HomeController::class, 'talkastrologer'])->name('talkastrologer');
Route::get('/astrologer-chat-list', [HomeController::class, 'astrologerChatList'])->name('astrologer.chatlist');
Route::get('/astrologer-chat', [HomeController::class, 'astrologerChat'])->name('astrologer.chat');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/term', [HomeController::class, 'term'])->name('term');
// Route::get('/blog', [HomeController::class, 'blog'])->name('blog');

// Horoscope api 


Route::get('generate-daily-horscope', [HoroscopeController::class, 'generateDailyHorscope'])->name('generate-daily-horscope');
Route::get('generate-weekly-horscope', [HoroscopeController::class, 'generateWeeklyHorscope'])->name('generate-weekly-horscope');
Route::get('generate-yearly-horscope', [HoroscopeController::class, 'generateYearlyHorscope'])->name('generate-yearly-horscope');


// Admin Login Routes
Route::get('/admin', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Admin Dashboard
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/customers', [CustomerController::class, 'index'])->name('admin.customers');

    // Astrologer
    Route::get('/admin/astrologers', [AstrologerController::class, 'index'])->name('admin.astrologers');
    Route::get('/admin/review', [AstrologerController::class, 'review'])->name('admin.review');
    Route::get('/admin/skills', [AstrologerController::class, 'skills'])->name('admin.skills');
    Route::get('/admin/categories', [AstrologerController::class, 'category'])->name('admin.categories');
    Route::get('/admin/block-astrologer', [AstrologerController::class, 'block'])->name('admin.block-astrologer');
    Route::get('/admin/pending-request', [AstrologerController::class, 'requestindex'])->name('admin.pending-request');
    Route::get('/admin/commission', [AstrologerController::class, 'commission'])->name('admin.commission');

    // horoscope
    Route::get('/admin/weekly-horoscope', [HoroscopeController::class, 'weekly'])->name('admin.horoscope.weekly');
    Route::get('/admin/daily-horoscope', [HoroscopeController::class, 'daily'])->name('admin.horoscope.daily');
    Route::get('/admin/yearly-horoscope', [HoroscopeController::class, 'yearly'])->name('admin.horoscope.yearly');
    Route::get('/admin/feedback-horoscope', [HoroscopeController::class, 'feedback'])->name('admin.horoscope.feedback');


    Route::get('/admin/g-setting', [GeneralSettingController::class, 'general'])->name('admin.g-setting.general');
   Route::get('/admin/g-setting/payments', [GeneralSettingController::class, 'payments'])->name('admin.g-setting.payments');
   Route::get('/admin/g-setting/social_link', [GeneralSettingController::class, 'social_link'])->name('admin.g-setting.social_link');
//    Route::post('/admin/g-setting/third_party_package', [GeneralSettingController::class, 'third_party_package'])->name('admin.g-setting.third_party_package');
   
Route::any('/admin/g-setting/third_party_package', [GeneralSettingController::class, 'third_party_package'])->name('admin.g-setting.third_party_package');

// Route::get('setting', [SystemFlagController::class, 'getSystemFlag'])->name('setting');
        Route::post('editSystemFlag', [GeneralSettingController::class, 'editSystemFlag'])->name('editSystemFlag');
       


   Route::get('/admin/g-setting/master_image', [GeneralSettingController::class, 'master_image'])->name('admin.g-setting.master_image');
   Route::get('/admin/g-setting/website_config', [GeneralSettingController::class, 'website_config'])->name('admin.g-setting.website_config');


    // Arti

    Route::prefix('admin/arti')->group(function () {
        Route::get('/audio', [AudioController::class, 'index'])->name('admin.arti.audio');
        Route::post('/audio', [AudioController::class, 'store']);
        Route::delete('/audio/{id}', [AudioController::class, 'destroy'])->name('admin.arti.audio.destroy');
    });
    Route::prefix('admin/arti')->group(function () {
        Route::get('/pdf', [PdfController::class, 'index'])->name('admin.arti.pdf');
        Route::post('/pdf', [PdfController::class, 'store'])->name('admin.arti.pdf.store');
        Route::delete('/pdf/{id}', [PdfController::class, 'destroy'])->name('admin.arti.pdf.destroy');
    });

    Route::prefix('admin/live')->group(function () {
        Route::get('/video', [ArtiController::class, 'index'])->name('admin.live.arti');
        Route::post('/video', [ArtiController::class, 'store'])->name('admin.live.arti.store');
        Route::delete('/video/{id}', [ArtiController::class, 'destroy'])->name('admin.live.arti.destroy');
    });





    Route::get('/admin/temple-list', [TempleController::class, 'index'])->name('admin.temple.list');
    Route::get('/admin/temple-view/{id}', [TempleController::class, 'view'])->name('admin.temple.view');
    Route::get('/admin/temple-add', [TempleController::class, 'add'])->name('admin.temple.add');
    Route::post('/admin/temple-store', [TempleController::class, 'store'])->name('admin.temple.store');

    Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin.blog.list');
    Route::get('/admin/video', [VideosController::class, 'index'])->name('admin.video.video');
    Route::get('/admin/banner', [BannerController::class, 'index'])->name('admin.banner.banner');
    Route::get('/admin/notifications', [NotificationsController::class, 'index'])->name('admin.notifications.index');
    Route::get('/admin/support-management', [SupportController::class, 'index'])->name('admin.support-management.FAQs');


    Route::get('/admin/feedback', [FeedbackController::class, 'index'])->name('admin.feedback');
    Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin.contact.index');
    Route::get('/admin/page-management', [PageManagementController::class, 'index'])->name('admin.page-management.index');
});
