<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\PreventBackHistoryMiddleware;
use App\Http\Middleware\PreventCitizenBackHistoryMiddleware;

// ===== Frontend Controllers
use App\Http\Controllers\frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\frontend\AboutUsController;
use App\Http\Controllers\frontend\ServicesController;
use App\Http\Controllers\frontend\StoreController;
use App\Http\Controllers\frontend\AwardsMediaController;
use App\Http\Controllers\frontend\BlogsController;
use App\Http\Controllers\frontend\CareersController;
use App\Http\Controllers\frontend\ContactUsController;

// ========== Citizen
use App\Http\Controllers\frontend\Auth\LoginController as CitizenLoginController;
use App\Http\Controllers\frontend\Auth\RegisterController as CitizenRegisterController;
use App\Http\Controllers\frontend\Auth\ForgotPasswordController as CitizenForgotPasswordController;
use App\Http\Controllers\frontend\Auth\ResetPasswordController as CitizenResetPasswordController;
use App\Http\Controllers\frontend\CheckoutController;


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
use App\Http\Controllers\backend\OurServiceController;
use App\Http\Controllers\backend\ProductCategoryController;
use App\Http\Controllers\backend\ProductSubCategoryController;
use App\Http\Controllers\backend\ProductColorsController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\ProductFaqController;


Route::get('/login', function () {
    // check if the user session expire web guard then redirect to admin.login page else redirect to frontend.login page
    if (Auth::guard('web')->check()) {
        return redirect()->route('admin.login');
    } elseif (Auth::guard('citizen')->check()) {
        return redirect()->route('frontend.citizen.login');
    } else {
        return redirect()->route('frontend.home');
    }
})->name('login');


// ==== Frontend
Route::group(['prefix'=> '', 'middleware'=>[PreventCitizenBackHistoryMiddleware::class]],function(){

    // ==== Home
    Route::get('/', [FrontendHomeController::class, 'index'])->name('frontend.home');

    // ==== frontend.project.details
    Route::get('/project-details/{slug}', [FrontendHomeController::class, 'projectDetails'])->name('frontend.project.details');

    // ==== About US
    Route::get('/about-us', [AboutUsController::class, 'about'])->name('frontend.about');

    // ==== Services
    Route::get('/services', [ServicesController::class, 'services'])->name('frontend.services');

    // ==== Awards & Media
    Route::get('/awards-media', [AwardsMediaController::class, 'awards'])->name('frontend.awards');

    // ==== Blogs
    Route::get('/blogs', [BlogsController::class, 'blogs'])->name('frontend.blogs');
    Route::get('/blogs/{id}', [BlogsController::class, 'blog_details'])->name('frontend.blog_details');

    // ==== Careers
    Route::get('/careers', [CareersController::class, 'careers'])->name('frontend.careers');
    Route::post('send-career-email', [CareersController::class, 'sendCareerEmail'])->name('send-career-email');

    // ==== Contact US
    Route::get('/contact-us', [ContactUsController::class, 'contact'])->name('frontend.contact');
    Route::post('send-contact-email', [ContactUsController::class, 'sendContactEmail'])->name('send-contact-email');

    // ==== Subscribe Newsletter
    Route::post('subscribe-newsletter', [FrontendHomeController::class, 'subscribeNewsletter'])->name('subscribe-newsletter');

});

// ==== Store Product [Ecommerce] Group
Route::group(['prefix'=> 'store', 'middleware'=>[PreventCitizenBackHistoryMiddleware::class]], function(){

    // ==== Store Register
    Route::get('register', [CitizenRegisterController::class, 'citizenRegister'])->name('frontend.citizen.register');
    Route::post('register/store', [CitizenRegisterController::class, 'citizenStore'])->name('frontend.citizen.register.store');

    // ==== Store Login
    Route::get('login', [CitizenLoginController::class, 'citizenLogin'])->name('frontend.citizen.login');
    Route::post('login/store', [CitizenLoginController::class, 'citizenLoginStore'])->name('frontend.citizen.login.store');

    // ===== Send Password Reset Link
    Route::get('forgot-password', [CitizenForgotPasswordController::class, 'citizenShowLinkRequestForm'])->name('frontend.citizen.forget-password.request');
    Route::post('forgot-password/send-email-link', [CitizenForgotPasswordController::class, 'citizenSendResetLinkEmail'])->name('frontend.citizen.forget-password.send-email-link.store');

    // ===== Reset Password
    Route::get('reset-password/{token}', [CitizenResetPasswordController::class, 'citizenShowResetForm'])->name('frontend.citizen.password.reset');
    Route::post('reset-password', [CitizenResetPasswordController::class, 'citizenUpdatePassword'])->name('frontend.citizen.password.update');

    // ==== Products
    Route::get('products',[StoreController::class, 'storeProductsList'])->name('frontend.products');

    // ==== Product Details
    Route::get('product-details/{slug?}', [StoreController::class, 'productDetails'])->name('frontend.product.details');

    // ==== Products Fillter
    Route::post('products/filter', [StoreController::class, 'filterProducts'])->name('frontend.products.filter');

    // ==== Add to Cart
    Route::get('cart', [StoreController::class, 'cart'])->name('frontend.cart');

    // ==== Add to Wishlist
    Route::get('wishlist', [StoreController::class, 'wishlist'])->name('frontend.wishlist');

});

// ==== Citizen Dashboard
Route::group(['prefix'=> 'store', 'middleware' => ['auth:citizen', PreventCitizenBackHistoryMiddleware::class]], function(){

    // ==== My Profile
    Route::get('my-profile', [StoreController::class, 'myProfile'])->name('frontend.myProfile');

    // ==== Orders
    Route::get('orders', [StoreController::class, 'orders'])->name('frontend.orders');

    // ==== Address
    Route::get('address', [StoreController::class, 'address'])->name('frontend.address');

    // ==== Billing Address
    Route::post('update-billing-address/{id}', [StoreController::class, 'updateBillingAddress'])->name('frontend.updateBillingAddress');

    // ==== Shipping Address
    Route::post('update-shipping-address/{id}', [StoreController::class, 'updateShippingAddress'])->name('frontend.updateShippingAddress');

    // ==== Account Details
    Route::get('account-details', [StoreController::class, 'accountDetails'])->name('frontend.accountDetails');

    // ==== Update Account Details
    Route::post('account-details/update/{id}', [StoreController::class, 'updateAccountDetails'])->name('frontend.updateAccountDetails');

    // ==== Change Password
    Route::get('change-password', [StoreController::class, 'changePassword'])->name('frontend.change-password');
    Route::post('change-password', [StoreController::class, 'updatePassword'])->name('frontend.update-password');

    // ==== Logout
    Route::post('logout', [CitizenLoginController::class, 'citizenLogout'])->name('frontend.citizen.logout');

    // ==== Add to Cart
    Route::post('add-to-cart', [StoreController::class, 'addToCart'])->name('frontend.addToCart');

    // ==== Add to Wishlist
    Route::post('add-to-wishlist', [StoreController::class, 'addToWishlist'])->name('frontend.addToWishlist');

    // ==== Checkout
    Route::get('checkout', [StoreController::class, 'checkout'])->name('frontend.checkout');

    // ==== Update Cart Quantity
    Route::post('cart/update-quantity', [StoreController::class, 'updateCartQuantity'])->name('frontend.updateCartQuantity');

    // ==== Remove Cart Item
    Route::post('remove-cart-item', [StoreController::class, 'removeCartItem'])->name('frontend.removeCartItem');

    // ==== Remove Wishlist Item
    Route::delete('/wishlist/{id}', [StoreController::class, 'destroy'])->name('wishlist.destroy');

    // ==== Checkout Store
    Route::post('checkout/store/{citizenId?}/{productId?}/{cartId?}',  [CheckoutController::class, 'checkoutStore'])->name('frontend.checkout.store');

    // ==== Payment Success/Failure by Easebuzz
    Route::post('/payment/success', [CheckoutController::class, 'success'])->name('payment.success');
    Route::post('/payment/failure', [CheckoutController::class, 'failure'])->name('payment.failure');

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

    // ==== Blog Category Management
    Route::resource('blog-category', BlogCategoryController::class);

    // ==== Blog Management
    Route::resource('blogs', BlogController::class);

    // ==== Careers Management
    Route::resource('careers', CareerController::class);

    // ==== About Careers Management
    Route::resource('about-careers', AboutCareerController::class);

    // ==== Job Position Management
    Route::resource('job-position', JobPositionController::class);

    // ==== Job Position Details Management
    Route::resource('job-position-details', JobPositionDetailsController::class);

    // ==== Manage Applied Job Application List
    Route::get('applied-job-application/list', [JobPositionDetailsController::class, 'fetchAppliedJobApplications'])->name('applied-job-application.list');
    Route::get('applied-job-application/{id}', [JobPositionDetailsController::class, 'appliedJobApplicationDetails'])->name('applied-job-application.details');

    // ==== Introduction Management
    Route::resource('introduction', IntroductionController::class);

    // ==== Showroom Management
    Route::resource('showroom', ShowroomController::class);

    // ==== Manufacturing Facility Management
    Route::resource('manufacturing-facility', ManufacturingFacilityController::class);

    // ==== Vision Management
    Route::resource('vision', VisionController::class);

    // ==== Team Management
    Route::resource('team', TeamController::class);

    // ==== Team Member Management
    Route::resource('team-member', TeamMemberController::class);

    // ==== International Associates Management
    Route::resource('international-associates', InternationalAssociatesController::class);

    // ==== Our Services Management
    Route::resource('our-services', OurServiceController::class);

    // ==== Product Category Management
    Route::resource('product-category', ProductCategoryController::class);

    // ==== Product Sub Category Management
    Route::resource('product-sub-category', ProductSubCategoryController::class);

    // ==== Product Colors Management
    Route::resource('product-colors', ProductColorsController::class);

    // ==== Product Management
    Route::resource('product', ProductController::class);

    // ==== Product FAQ Management
    Route::resource('product-faq', ProductFaqController::class);

});

// ==== Robots
Route::get('/robots.txt', function () {
    return response("User-agent: *\nDisallow:", 200)
        ->header('Content-Type', 'text/plain')
        ->header('X-Robots-Tag', 'noindex')
        ->header('X-Content-Type-Options', 'nosniff')
        ->header('X-XSS-Protection', '1; mode=block')
        ->header('X-Frame-Options', 'SAMEORIGIN');
});

// ==== Sitemap
Route::get('/sitemap.xml', function () {
    return response()->view('sitemap')
        ->header('Content-Type', 'text/xml')
        ->header('X-Robots-Tag', 'noindex')
        ->header('X-Content-Type-Options', 'nosniff')
        ->header('X-XSS-Protection', '1; mode=block')
        ->header('X-Frame-Options', 'SAMEORIGIN')
        ->header('Content-Type', 'application/xml')
        ->header('Content-Disposition', 'attachment; filename="sitemap.xml"')
        ->header('Content-Transfer-Encoding', 'binary');
});
