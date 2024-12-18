<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PreventBackHistoryMiddleware;

// ===== Frontend Controllers
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\frontend\AboutUsController;
use App\Http\Controllers\frontend\ServicesController;
use App\Http\Controllers\frontend\StoreController;
use App\Http\Controllers\frontend\AwardsMediaController;
use App\Http\Controllers\frontend\BlogsController;
use App\Http\Controllers\frontend\CareersController;
use App\Http\Controllers\frontend\ContactUsController;


// ===== Backend Controllers
use App\Http\Controllers\backend\Auth\RegisterController;
use App\Http\Controllers\backend\Auth\LoginController;
use App\Http\Controllers\backend\Auth\ForgotPasswordController;
use App\Http\Controllers\backend\Auth\ResetPasswordController;
use App\Http\Controllers\backend\HomeController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ProjectController;
use App\Http\Controllers\backend\ProjectDetailsController;
use App\Http\Controllers\backend\TestimonialController;
use App\Http\Controllers\backend\CompanyInformationController;
use App\Http\Controllers\backend\AwardMediaController;
use App\Http\Controllers\backend\BlogCategoryController;
use App\Http\Controllers\backend\BlogController;
use App\Http\Controllers\backend\CareerController;
use App\Http\Controllers\backend\AboutCareerController;
use App\Http\Controllers\backend\JobPositionController;
use App\Http\Controllers\backend\JobPositionDetailsController;
use App\Http\Controllers\backend\IntroductionController;
use App\Http\Controllers\backend\ShowroomController;
use App\Http\Controllers\backend\ManufacturingFacilityController;
use App\Http\Controllers\backend\VisionController;
use App\Http\Controllers\backend\TeamController;
use App\Http\Controllers\backend\TeamMemberController;
use App\Http\Controllers\backend\InternationalAssociatesController;



Route::get('/login', function () {
    return redirect()->route('admin.login');
})->name('login');


// ==== Frontend
Route::group(['prefix'=> '', 'middleware'=>[PreventBackHistoryMiddleware::class]],function(){

    // ==== Home
    Route::get('/', [FrontendHomeController::class, 'index'])->name('frontend.home');

    // ==== About US
    Route::get('/about-us', [AboutUsController::class, 'about'])->name('frontend.about');

    // ==== Services
    Route::get('/services', [ServicesController::class, 'services'])->name('frontend.services');

    // ==== Store
    Route::get('store',[StoreController::class, 'store'])->name('frontend.store');

    // ==== Awards & Media
    Route::get('/awards-media', [AwardsMediaController::class, 'awards'])->name('frontend.awards');

    // ==== Blogs
    Route::get('/blogs', [BlogsController::class, 'blogs'])->name('frontend.blogs');
    Route::get('/blogs/{slug}', [BlogsController::class, 'blog_details'])->name('frontend.blog_details');

    // ==== Careers
    Route::get('/careers', [CareersController::class, 'careers'])->name('frontend.careers');

    // ==== Contact US
    Route::get('/contact-us', [ContactUsController::class, 'contact'])->name('frontend.contact');

});

// ===== Admin Register
Route::get('admin/register', [RegisterController::class,'register'])->name('admin.register');
Route::post('admin/register/store', [RegisterController::class,'store'])->name('admin.register.store');

// ===== Admin Login/Logout
Route::get('admin/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('admin/login/store', [LoginController::class, 'authenticate'])->name('admin.login.store');
Route::post('admin/logout', [LoginController::class, 'logout'])->name('admin.logout');

// ===== Send Password Reset Link
Route::get('admin/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('admin.forget-password.request');
Route::post('admin/forgot-password/send-email-link', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('admin.forget-password.send-email-link.store');

// ===== Reset Password
Route::get('admin/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('admin.password.reset');
Route::post('admin/reset-password', [ResetPasswordController::class, 'updatePassword'])->name('admin.password.update');


Route::group(['prefix' => 'admin', 'middleware' => ['auth:web', PreventBackHistoryMiddleware::class]], function () {

    // ===== Admin Dashboard
    Route::get('home', [HomeController::class, 'adminHome'])->name('admin.dashboard');

    // ==== Update Password
    Route::get('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [HomeController::class, 'updatePassword'])->name('update-password');

    // ==== Banners Management
    Route::resource('banner', BannerController::class);

    // ==== Cateegory Management
    Route::resource('category', CategoryController::class);

    // ==== Project Management
    Route::resource('project', ProjectController::class);

    // ==== Project Details Management
    Route::resource('project-details', ProjectDetailsController::class);

    // ==== Fetch Slug for Project Details
    Route::post('fetch-project-slug', [ProjectDetailsController::class, 'fetchProjectSlug'])->name('fetch-project-slug');

    // ==== Testimonial Management
    Route::resource('testimonial', TestimonialController::class);

    // ==== Company Information Management
    Route::resource('companyInformation', CompanyInformationController::class);

    // ==== Awards & Media Management
    Route::resource('awards-media', AwardMediaController::class);

    // ==== Manage Blog Category Management
    Route::resource('blog-category', BlogCategoryController::class);

    // ==== Manage Blog Management
    Route::resource('blogs', BlogController::class);

    // ==== Manage Careers Management
    Route::resource('careers', CareerController::class);

    // ==== Manage About Careers Management
    Route::resource('about-careers', AboutCareerController::class);

    // ==== Manage Job Position Management
    Route::resource('job-position', JobPositionController::class);

    // ==== Manage Job Position Details Management
    Route::resource('job-position-details', JobPositionDetailsController::class);

    // ==== Manage Introduction Management
    Route::resource('introduction', IntroductionController::class);

    // ==== Manage Showroom Management
    Route::resource('showroom', ShowroomController::class);

    // ==== Manage Manufacturing Facility Management
    Route::resource('manufacturing-facility', ManufacturingFacilityController::class);

    // ==== Manage Vision Management
    Route::resource('vision', VisionController::class);

    // ==== Manage Team Management
    Route::resource('team', TeamController::class);

    // ==== Manage Team Member Management
    Route::resource('team-member', TeamMemberController::class);

    // ==== Manage International Associates Management
    Route::resource('international-associates', InternationalAssociatesController::class);

});
