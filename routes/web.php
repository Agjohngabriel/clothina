<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowProductsController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Voyager\ProductsController;
use App\Models\Variety;
use App\Http\Controllers\PayPalPaymentController;
use App\Http\Controllers\ConfirmationController;
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
Route::get('about', function ()
{
	return view('about');
})->name('about');
Route::get('faq', function ()
{
	return view('about');
})->name('faq');
Route::get('terms', function ()
{
	return view('about');
})->name('terms');

Route::get('/contact', function ()
{
	// $categories = Variety::all();
	return view('contact');
})->name('contact');
Route::post('/message', [MessagesController::class, 'store'])->name('message');

Route::get('/', [ShowProductsController::class, 'index'])->name('landingPage');

Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{product}', [ShopController::class, 'show'])->name('shop.show');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add', [CartController::class, 'store'])->name('cart.add');
Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout')->middleware('auth');
Route::get('/guestcheckout', [CheckoutController::class, 'index'])->name('guestCheckout.index');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('confirmation', [ConfirmationController::class, 'index'])->name('confirm');

Route::post('/coupon', [CouponController::class, 'store'])->name('coupon.store');
Route::delete('/coupon', [CouponController::class, 'destroy'])->name('coupon.destroy');

Route::post('/search', [ShopController::class, 'searchProduct'])->name('searchProduct');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('handle-payment', [PayPalPaymentController::class, 'handlePayment'])->name('make.payment');
Route::get('cancel-payment', [PayPalPaymentController::class, 'paymentCancel'])->name('cancel.payment');
Route::get('payment-success', [PayPalPaymentController::class, 'paymentSuccess'])->name('success.payment');
