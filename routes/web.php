<?php

use App\Http\Controllers\admin\AddonsController;
use App\Http\Controllers\admin\AirportController;
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\BookingController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ImageController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\PriceCategoryController;
use App\Http\Controllers\admin\PricesController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\ProductsController;
use App\Http\Controllers\admin\PromotionsController;
use App\Http\Controllers\admin\TermsAndConditionsController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\StripeWebhookController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Cashier\Http\Controllers\WebhookController;

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

// Admin Auth Routes
Route::prefix('admin')->group(function () {
    Route::get('/', [AuthController::class, 'loginView'])->name('admin.login');
    Route::get('/login', [AuthController::class, 'loginView'])->name('admin.login');
    Route::post('/login', [AuthController::class, 'login'])->name('admin.post-login');

    Route::get('/forgot-password', [AuthController::class, 'forgotPasswordView'])->name('admin.forgot.password');
    Route::post('/password-email', [AuthController::class, 'sendResetLinkEmail'])->name('admin.password.email');
    Route::post('/verification-resend', [AuthController::class, 'sendResetLinkEmail'])->name('admin.verification.resend');
    Route::get('/password/reset/{token}', [AuthController::class, 'resetPassword']);
    Route::post('/password/update', [AuthController::class, 'updatePassword'])->name('admin.password.update');
});

// Admin Auth Routes after Login
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth:sanctum']], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductsController::class);
    Route::resource('addons', AddonsController::class);
    Route::resource('promotions', PromotionsController::class);
    Route::resource('prices', PricesController::class);
    Route::resource('pricecategory', PriceCategoryController::class);
    Route::get('logout', [DashboardController::class, 'logout'])->name('logout');

    Route::resource('airport', AirportController::class);
    Route::post('upload-image', [ImageController::class, 'uploadImage']);
    Route::resource('customers', CustomerController::class);
    Route::resource('terms-and-conditions', TermsAndConditionsController::class);
    Route::resource('booking', BookingController::class);

    Route::get('/fetch-terminals/{selectedAirportId}', [AirportController::class, 'fetchTerminals']);
    Route::post('/add-note', [BookingController::class, 'addNote']);
    Route::put('/edit-note', [BookingController::class, 'editNote']);
    Route::delete('/delete-note/{id}', [BookingController::class, 'deleteNote']);
    Route::post('newcategory', [PricesController::class, 'createnewcategory'])->name('newcategory');
    Route::post('savenoofdays', [PricesController::class, 'createnoofdays'])->name('savenoofdays');
    Route::post('savemonthcategorys', [PricesController::class, 'createmonthcategorys'])->name('savemonthcategorys');
    Route::get('/fetch-noofdays/{selectedCategoryId}', [PricesController::class, 'fetchnoofdays'])->name('getnoofdaysbyCategoryid');
    Route::post('fetch-product-category/', [PricesController::class, 'fetchproductcategory'])->name('getproductcategory');
    Route::post('fetch-category/', [PricesController::class, 'fetchmonthcategories'])->name('getmonthcategorybyairportid');
    Route::post('test', [PricesController::class, 'createtest'])->name('test');
});

Route::any('/stripe/webhook', [StripeWebhookController::class, 'handleWebhook'])->name('cashier.webhook');;


/*
 * Admin routes starts
 */

Route::get('/', function () {
    return view('front.home.home');
});
Route::get('/what-parking', function () {
    return view('front.meet-greet-parking.meet-greet-parking');
});
Route::get('/ev-parking', function () {
    return view('front.ev-parking.ev-parking');
});
Route::get('/business-parking', function () {
    return view('front.business-parking.business-parking');
});
Route::get('/directions', function () {
    return view('front.directions.directions');
});
Route::get('/login', function () {
    return view('front.login.login');
});
Route::get('/profile-info', function () {
    return view('front.profile-info.profile-info');
});
Route::get('/your-account', function () {
    return view('front.your-account.your-account');
});
Route::get('/previous-bookings', function () {
    return view('front.previous-bookings.previous-bookings');
});
Route::get('/amend-booking', function () {
    return view('front.amend-booking.amend-booking');
});
Route::get('/previous-bookings-summary', function () {
    return view('front.previous-bookings-summary.previous-bookings-summary');
});
Route::get('/checkout', function () {
    return view('front.checkout.checkout');
});
Route::get('/booking-confirmation', function () {
    return view('front.booking-confirmation.booking-confirmation');
});
Route::get('/contact-us', function () {
    return view('front.contact.contact');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
