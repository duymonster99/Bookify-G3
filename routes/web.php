<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutCustomerController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PaypalController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', function () {
    return view('home');
}) -> name("index");

Route::get('/product/products', [ProductController::class, 'productManage'])->name('client.products.index');
Route::get('/product/products/get-more-products', [ProductController::class, 'getMoreProducts'])->name('products.getMoreProducts');

Route::get('/product_detail', function () {
    return view('product.product_detail');
}) -> name('product_detail');

Route::get('/products/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('addToCart');
Route::get('/shopping_cart', [CartController::class, 'showCart'])->name('showCart');
Route::get('/shopping_cart/update-cart', [CartController::class, 'update'])->name('updateCart');
Route::get('/shopping_cart/delete-cart', [CartController::class, 'delete'])->name('deleteCart');

// Checkout
// Route::get('/payment/payment', [CheckoutCustomerController::class, 'showCheckoutForm'])->name('showCheckout');
// Route::post('/payment/checkout', [CheckoutCustomerController::class, 'order_place'])->name('checkout.cart');
// Route::post('/payment/checkout/paypal', [PaypalController::class, 'paypal'])->name('checkout.paypal');
// Route::get('/payment/checkout/success', [PaypalController::class, 'success'])->name('checkout.success');
// Route::get('/payment/checkout/cancel', [PaypalController::class, 'cancel'])->name('checkout.cancel');

Route::get('/demo', function () {
    return view('demo');
}) -> name('demo');


// Coupon manage
Route::get('/admin/coupon', [CouponController::class, 'showCoupon'])->name('showCoupon');
Route::get('/admin/add-coupon', [CouponController::class, 'create'])->name('create.coupon');
Route::post('/admin/coupon/store', [CouponController::class, 'store'])->name('coupon.store');
// routes/web.php

Route::get('/shopping_cart/select-coupon/{id}', [CouponController::class, 'selectCoupon'])->name('select.coupon');



// ====================
// Log in log out
// ====================

Route::get('/sign_in', [UsersController::class, 'showFormLogin']) ->name("login.form");
Route::post('/sign_in', [UsersController::class, 'login']) ->name("login.check");
Route::get('/logout', [UsersController::class, 'logout']) ->name("user.logout");

Route::get('/sign_up', function () {
    return view('account.sign_up');
}) ->name('sign_up');
Route::get('/sign_up/store', [UsersController::class, 'store']) ->name("user.store");
Route::post('/sign_up/store', [UsersController::class, 'store']) ->name("user.store");

Route::get('/forget_pass', function () {
    return view('account.forget_pass');
}) ->name('forget_pass');

Route::get('/success', function () {
    return view('account.success');
}) ->name('success');

// Login with Social
Route::get('auth/google', [UsersController::class, 'redirectGoogle']) ->name('login.google');
Route::get('/auth/google/callback', [UsersController::class, 'loginGoogle']);

// dashboard admin
Route::get('/admin', [ProductController::class, 'index'])->name("admin.index");
// product page
Route::get('/admin/products/index', [ProductController::class, 'productAdmin'])->name("products.index");
Route::get('/admin/products/create', [ProductController::class, 'create'])->name("products.create");
Route::post('/admin/products/store', [ProductController::class, 'store'])->name("products.store");
Route::put('/admin/products/edit', [ProductController::class, 'edit'])->name("products.edit");
Route::get('/admin/products/delete/{id}', [ProductController::class, 'delete'])->name("products.delete");

// author page
Route::get('/admin/authors/index', [AuthorController::class, 'index'])->name("authors.index");
Route::get('/admin/authors/create', [AuthorController::class, 'create'])->name("authors.create");
Route::post('/admin/authors/store', [AuthorController::class, 'store'])->name("authors.store");
Route::put('/admin/authors/edit/{id}', [AuthorController::class, 'edit'])->name("authors.edit");
Route::get('/admin/authors/delete/{id}', [AuthorController::class, 'delete'])->name("authors.delete");

// category page
Route::get('/admin/categories/index', [CategoryController::class, 'index'])->name("categories.index");
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name("categories.create");
Route::post('/admin/categories/store', [CategoryController::class, 'store'])->name("categories.store");
Route::put('/admin/categories/edit/{id}', [CategoryController::class, 'edit'])->name("categories.edit");
Route::get('/admin/categories/delete/{id}', [CategoryController::class, 'delete'])->name("categories.delete");

// publisher page
Route::get('/admin/publishers/index', [PublisherController::class, 'index'])->name("publishers.index");
Route::get('/admin/publishers/create', [PublisherController::class, 'create'])->name("publishers.create");
Route::post('/admin/publishers/store', [PublisherController::class, 'store'])->name("publishers.store");
Route::put('/admin/publishers/edit/{id}', [PublisherController::class, 'edit'])->name("publishers.edit");
Route::get('/admin/publishers/delete/{id}', [PublisherController::class, 'delete'])->name("publishers.delete");
