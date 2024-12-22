<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SocialLinksController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\WebsiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    // login routes
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login');
});

Route::middleware(['auth', 'setLocale'])->group(function () {
    // dashboard routes
    Route::get('/', [DashboardController::class, 'index'])->name('index');

    // locale routes
    Route::post('locale', [DashboardController::class, 'setLocale'])->name('setLocale');

    // users routes
    Route::resource('users', UserController::class)->except('show');

    // roles routes
    Route::resource('roles', RoleController::class)->except('show');

    // services routes
    Route::resource('services', ServiceController::class)->except('show');

    // articles routes
    Route::resource('articles', ArticleController::class)->except('show');

    // articles routes
    Route::resource('projects', ProjectController::class)->except('show');

    // testimonials routes
    Route::resource('testimonials', TestimonialController::class)->except('show');

    // contactus routes
    Route::resource('contactus', ContactUsController::class)->except('show');

    // articles routes
    Route::resource('packages', PackageController::class)->except('show');
    // packages charts
    Route::get('/packages/chart-data', [PackageController::class, 'getPackagesData'])->name('packages.chartData');


    // contactus routes
    Route::resource('social_links', SocialLinksController::class);



    Route::get('terms', [TermController::class, 'index'])->name('terms.index');
    Route::post('terms/update', [TermController::class, 'update'])->name('terms.update');



    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings/update', [SettingController::class, 'update'])->name('settings.update');

    // profile routes
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('profile/picture/update', [ProfileController::class, 'updatePicture'])->name('profile.picture.update');
    Route::put('profile/password/update', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    // logout routes
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');




















    // ====================================================== Website Routes ======================================================

    Route::middleware(['setLocale'])->group(function () {
        // locale routes
        Route::post('locale', [WebsiteController::class, 'setLocale'])->name('setLocale');
        Route::get('/website', [WebsiteController::class, 'index'])->name('website.index');
        Route::get('/website/features', [WebsiteController::class, 'features'])->name('website.features');
        Route::get('/website/projects', [WebsiteController::class, 'projects'])->name('website.projects');
        Route::get('/website/projects/{id}', [WebsiteController::class, 'projectsDetail'])->name('website.projects.detail');
        Route::get('/website/blog', [WebsiteController::class, 'blog'])->name('website.blog');
        Route::get('/website/blog/{id}', [WebsiteController::class, 'blogDetail'])->name('website.blog.detail');
        Route::get('/website/contact', [WebsiteController::class, 'contact'])->name('website.contact');
        Route::post('/website/contact', [WebsiteController::class, 'contactUsForm'])->name('website.contactUsForm');
        Route::get('/website/terms', [WebsiteController::class, 'terms'])->name('website.terms');

        Route::get('/website/packags/marketing', [WebsiteController::class, 'marketingPackages'])->name('website.marketingPackages');
        Route::get('/website/packags/servers', [WebsiteController::class, 'serversPackages'])->name('website.serversPackages');
        Route::get('/website/packags/emails', [WebsiteController::class, 'emailsPackages'])->name('website.emailsPackages');
    });
});
