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
use App\Http\Controllers\WisdomController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\VideosController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\EarningsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PageManagementController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MasterSettingController;
use App\Http\Controllers\TeamManageController;
use App\Http\Controllers\frontend\HomeController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\LiveDarsanController;
use App\Http\Controllers\frontend\user\UserAuthController;
use App\Http\Controllers\frontend\KundaliController;
use App\Http\Controllers\frontend\HoroscopeController as AstrologerHoroscopeController;
use App\Http\Controllers\frontend\Astrologer\AuthController as AstrologerAuthController;
use App\Http\Controllers\Admin\HororScopeSignController;


// frontent route

Route::get('/clear-cache', function () {
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
Route::post('/contact/add', [ContactController::class, 'store'])->name('add');

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
    // Route::get('/admin/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/admin/customers', [CustomerController::class, 'index'])->name('admin.customers');
    Route::get('/admin/addcustomer', [CustomerController::class, 'addcustomer'])->name('admin.addcustomer');
    Route::get('/admin/editcustomer', [CustomerController::class, 'editcustomer'])->name('admin.editcustomer');

    // Astrologer
    Route::get('/admin/astrologers', [AstrologerController::class, 'index'])->name('admin.astrologers');
    Route::get('/admin/addastrologer', [AstrologerController::class, 'addastrologer'])->name('admin.Astrologer.addastrologer');
    Route::get('/admin/editastrologer', [AstrologerController::class, 'editastrologer'])->name('admin.Astrologer.editastrologer');

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
        Route::get('/editaudio/{id}', [AudioController::class, 'editaudio'])->name('admin.arti.edit');
        Route::post('/admin/arti/audio/{id}/update', [AudioController::class, 'update'])->name('admin.arti.audio.update');
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
        Route::get('/editarti/{id}', [ArtiController::class, 'editarti'])->name('admin.live.editarti');
        Route::post('/video', [ArtiController::class, 'store'])->name('admin.live.arti.store');
        Route::post('/update/{id}', [ArtiController::class, 'update'])->name('admin.live.arti.update');

        Route::delete('/video/{id}', [ArtiController::class, 'destroy'])->name('admin.live.arti.destroy');

        Route::get('/darshan', [LiveDarsanController::class, 'index'])->name('admin.live.darshan');
        Route::get('/editdarshan/{id}', [LiveDarsanController::class, 'editdarshan'])->name('admin.live.editdarshan');
        Route::post('/darshan', [LiveDarsanController::class, 'store'])->name('admin.live.darshan.store');
        Route::post('/update/{id}', [LiveDarsanController::class, 'update'])->name('admin.live.darshan.update');
        Route::delete('/darshan/{id}', [LiveDarsanController::class, 'destroy'])->name('admin.live.darshan.destroy');
    });






    Route::get('/admin/temple-list', [TempleController::class, 'index'])->name('admin.temple.list');
    Route::get('/admin/temple-view/{id}', [TempleController::class, 'view'])->name('admin.temple.view');
    Route::get('/admin/temple-add', [TempleController::class, 'add'])->name('admin.temple.add');
    Route::post('/admin/temple-store', [TempleController::class, 'store'])->name('admin.temple.store');


    Route::get('/admin/wisdom', [WisdomController::class, 'wisdom'])->name('admin.Wisdom.wisdom');
    Route::get('/admin/wisdom/edit', [WisdomController::class, 'edit'])->name('admin.Wisdom.edit');


    Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin.blog.list');
    Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/admin/blog/store', [BlogController::class, 'store'])->name('admin.blog.store');
    Route::get('/admin/blog/edit/{id}', [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::post('/admin/blog/update/{id}', [BlogController::class, 'update'])->name('admin.blog.update');
    Route::get('/admin/blog/view/{id}', [BlogController::class, 'view'])->name('admin.blog.view');
    Route::delete('/admin/blog/destroy/{id}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');
    Route::get('/admin/video', [VideosController::class, 'index'])->name('admin.video.video');
    Route::get('/admin/video/create', [VideosController::class, 'create'])->name('admin.video.create');
    Route::post('/admin/video/store', [VideosController::class, 'store'])->name('admin.video.store');
    Route::get('/admin/video/edit/{id}', [VideosController::class, 'edit'])->name('admin.video.edit');
    Route::post('/admin/video/update/{id}', [VideosController::class, 'update'])->name('admin.video.update');
    Route::delete('/admin/video/destroy/{id}', [VideosController::class, 'destroy'])->name('admin.video.destroy');
    Route::get('/admin/banner', [BannerController::class, 'index'])->name('admin.banner.banner');
    Route::get('/admin/banner/create', [BannerController::class, 'create'])->name('admin.banner.create');
    Route::post('/admin/banner/store', [BannerController::class, 'store'])->name('admin.banner.store');
    Route::post('/admin/banner/update', [BannerController::class, 'update'])->name('admin.banner.update');
    Route::post('/admin/banner/update-status', [BannerController::class, 'updateStatus']);

    Route::get('/admin/notifications', [NotificationsController::class, 'index'])->name('admin.notifications.index');

    Route::get('/admin/support-management', [SupportController::class, 'index'])->name('admin.support-management.FAQs');
    Route::get('/admin/support-management/tickets', [SupportController::class, 'tickets'])->name('admin.support-management.tickets');

    Route::get('/admin/earnings/withdrawalmethods', [EarningsController::class, 'withdrawalmethods'])->name('admin.earnings.withdrawalmethods');
    Route::get('/admin/earnings/withdrawalRequests', [EarningsController::class, 'withdrawalRequests'])->name('admin.earnings.withdrawalRequests');
    Route::get('/admin/earnings/walletHistory', [EarningsController::class, 'walletHistory'])->name('admin.earnings.walletHistory');

    Route::get('/admin/reports/callHistory', [ReportsController::class, 'callHistory'])->name('admin.reports.callHistory');
    Route::get('/admin/reports/chatHistory', [ReportsController::class, 'chatHistory'])->name('admin.reports.chatHistory');
    Route::get('/admin/reports/partnerWiseEarning', [ReportsController::class, 'partnerWiseEarning'])->name('admin.reports.partnerWiseEarning');
    Route::get('/admin/reports/orderrequest', [ReportsController::class, 'orderrequest'])->name('admin.reports.orderrequest');
    Route::get('/admin/reports/reportrequest', [ReportsController::class, 'reportrequest'])->name('admin.reports.reportrequest');
    Route::get('/admin/reports/kundaliearning', [ReportsController::class, 'kundaliearning'])->name('admin.reports.kundaliearning');


    Route::get('/admin/master-setting/customerProfile', [MasterSettingController::class, 'customerProfile'])->name('admin.master-setting.customerProfile');
    Route::get('/admin/master-setting/horoscopeSigns', [MasterSettingController::class, 'horoscopeSigns'])->name('admin.master-setting.horoscopeSigns');
    Route::get('/admin/master-setting/rechargeAmount', [MasterSettingController::class, 'rechargeAmount'])->name('admin.master-setting.rechargeAmount');
    Route::get('/admin/master-setting/reportTypes', [MasterSettingController::class, 'reportTypes'])->name('admin.master-setting.reportTypes');



    Route::get('/admin/team-management/role', [TeamManageController::class, 'role'])->name('admin.team-management.role');
    Route::get('/admin/team-management/list', [TeamManageController::class, 'list'])->name('admin.team-management.list');


    Route::get('/admin/feedback', [FeedbackController::class, 'index'])->name('admin.feedback');
    Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin.contact.index');
    Route::get('/admin/page-management', [PageManagementController::class, 'index'])->name('admin.page-management.index');
    Route::post('/admin/pagemanagement/update', [PageManagementController::class, 'update'])->name('admin.page-management.update');
    Route::post('/admin/pagemanagement/updateStatus', [PageManagementController::class, 'updateStatus'])->name('admin.page-management.updateStatus');
    // Route::get('horoscopeSigns', [HororScopeSignController::class, 'addHororScopeSign'])->name('admin.horoscopeSigns');
    Route::get('horoscopeSigns', [HororScopeSignController::class, 'getHororScopeSign'])->name('admin.horoscopeSigns');

});

// end admin route


Route::get('/user_login', [UserAuthController::class, 'login'])->name('user.login');
Route::get('/user_registration', [UserAuthController::class, 'userRegister'])->name('user.register');
Route::post('/user_registration', [UserAuthController::class, 'userStore'])->name('user.store');


Route::get('/astro_login', [AstrologerAuthController::class, 'astrologerlogin'])->name('astrologerlogin');
Route::get('/astrologer_registration', [AstrologerAuthController::class, 'astrologerregister'])->name('astrologerregister');
Route::post('/registration', [AstrologerAuthController::class, 'astrologerstore'])->name('front.astrologerstore');


    // Route::get('/panchang', [KundaliController::class, 'getPanchang'])->name('front.getPanchang');
    // Route::get('/dailyhoroscope', [HoroscopeController::class, 'dailyHoroscope'])->name('front.dailyHoroscope');
    // Route::get('/horoscope', [HoroscopeController::class, 'horoScope'])->name('front.horoScope');

    // Route::get('/kundali', [KundaliController::class, 'getkundali'])->name('front.getkundali');
    // Route::get('/kundali-matching', [KundaliController::class, 'kundaliMatch'])->name('front.kundaliMatch');
    // Route::get('/kundali-match-report', [KundaliController::class, 'kundaliMatchReport'])->name('front.kundaliMatchReport');

    // Route::get('/dailyhoroscope', [AstrologerHoroscopeController::class, 'dailyHoroscope'])->name('front.dailyHoroscope');
    // Route::get('/horoscopes', [AstrologerHoroscopeController::class, 'horoScope'])->name('front.astrologers.horoScope');

Route::get('/panchang', [KundaliController::class, 'getPanchang'])->name('front.getPanchang');
Route::get('/dailyhoroscope', [HoroscopeController::class, 'dailyHoroscope'])->name('front.dailyHoroscope');
Route::get('/horoscope', [HoroscopeController::class, 'horoScope'])->name('front.horoScope');

Route::get('/kundali', [KundaliController::class, 'getkundali'])->name('front.getkundali');
Route::get('/kundali-matching', [KundaliController::class, 'kundaliMatch'])->name('front.kundaliMatch');
Route::get('/kundali-match-report', [KundaliController::class, 'kundaliMatchReport'])->name('front.kundaliMatchReport');

Route::get('/dailyhoroscope', [AstrologerHoroscopeController::class, 'dailyHoroscope'])->name('front.dailyHoroscope');
Route::get('/horoscopes', [AstrologerHoroscopeController::class, 'horoScope'])->name('front.astrologers.horoScope');
