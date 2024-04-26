<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminLeagueController;
use App\Http\Controllers\AdminLeagueTeamController;
use App\Http\Controllers\AdminCountryController;
use App\Http\Controllers\AdminCountryTeamController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\AdminSubCategoryController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminShoeController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
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
//Route::get('/', [RegistrationController::class, 'login_page'])->name('login-page');
Route::get('clear-cache',function(){
    \Artisan::call('cache:clear');
});
Route::get('/',[HomeController::class,'index'])->name('home');
Route::post('/sign-in', [RegistrationController::class, 'signin'])->name('sign-in');
Route::get('/sign-up', [RegistrationController::class, 'registration_page'])->name('sign-up');
Route::post('/sign-up', [RegistrationController::class, 'register'])->name('sign-up');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// admin product routes
Route::get('/admin/product/index',[AdminProductController::class,'index'])->name('admin.product.index');
Route::get('/admin/product/create',[AdminProductController::class,'create'])->name('admin.product.create');
Route::post('/admin/product/save',[AdminProductController::class,'save'])->name('admin.product.save');
Route::get('/admin/product/get-league-teams', [AdminProductController::class,'get_league_teams'])->name('admin.product.get-league-teams');
Route::get('/admin/product/get-country-teams', [AdminProductController::class,'get_country_teams'])->name('admin.product.get-country-teams');
Route::get('/admin/product/get-category-sub-categories', [AdminProductController::class,'get_category_sub_categories'])->name('admin.product.get-category-sub-categories');
Route::get('/admin/product/edit/{id}',[AdminProductController::class,'edit'])->name('admin.product.edit');
Route::post('/admin/product/update',[AdminProductController::class,'update'])->name('admin.product.update');
Route::post('/admin/product/image-delete',[AdminProductController::class,'image_delete'])->name('admin.product.image-delete');
Route::post('/admin/product/image-multiple-delete',[AdminProductController::class,'image_multiple_delete'])->name('admin.product.image-multiple-delete');

//admin products shoes routes
Route::get('/admin/product/shoes/index',[AdminShoeController::class,'index'])->name('admin.product.shoes.index');
Route::get('/admin/product/shoes/create',[AdminShoeController::class,'create'])->name('admin.product.shoes.create');
Route::post('/admin/product/shoes/save',[AdminShoeController::class,'save'])->name('admin.product.shoes.save');
Route::get('/admin/product/shoes/get-category-sub-categories', [AdminShoeController::class,'get_category_sub_categories'])->name('admin.product.shoes.get-category-sub-categories');

// admin Orders routes
Route::get('/admin/order/index',[AdminOrderController::class,'index'])->name('admin.order.index');
Route::post('/admin/order/status-change/{id}',[AdminOrderController::class,'status_change'])->name('admin.order.status-change');
Route::get('/admin/order/details/{id}',[AdminOrderController::class,'details'])->name('admin.order.details');
// Admin product routes
Route::get('/admin/leagues', [AdminLeagueController::class, 'index'])->name('admin.league.index');
Route::get('/admin/leagues/create', [AdminLeagueController::class, 'create'])->name('admin.league.create');
Route::post('/admin/leagues/save', [AdminLeagueController::class, 'save'])->name('admin.league.save');

// Admin league team routes
Route::get('/admin/league-teams', [AdminLeagueTeamController::class, 'index'])->name('admin.league-team.index');
Route::get('/admin/league-teams/create', [AdminLeagueTeamController::class, 'create'])->name('admin.league-team.create');
Route::post('/admin/league-teams/save', [AdminLeagueTeamController::class, 'save'])->name('admin.league-team.save');

// Admin country routes
Route::get('/admin/countries', [AdminCountryController::class, 'index'])->name('admin.country.index');
Route::get('/admin/countries/create', [AdminCountryController::class, 'create'])->name('admin.country.create');
Route::post('/admin/countries/save', [AdminCountryController::class, 'save'])->name('admin.country.save');

// Admin country team routes
Route::get('/admin/country-teams', [AdminCountryTeamController::class, 'index'])->name('admin.country-team.index');
Route::get('/admin/country-teams/create', [AdminCountryTeamController::class, 'create'])->name('admin.country-team.create');
Route::post('/admin/country-teams/save', [AdminCountryTeamController::class, 'save'])->name('admin.country-team.save');

// Admin category routes
Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->name('admin.category.index');
Route::get('/admin/categories/create', [AdminCategoryController::class, 'create'])->name('admin.category.create');
Route::post('/admin/categories/save', [AdminCategoryController::class, 'save'])->name('admin.category.save');
Route::get('/admin/categories/delete/{id}', [AdminCategoryController::class, 'delete'])->name('admin.category.delete');
Route::get('/admin/categories/status/{id}', [AdminCategoryController::class, 'status'])->name('admin.category.status');
// Admin subcategory routes
Route::get('/admin/subcategories', [AdminSubCategoryController::class, 'index'])->name('admin.subcategory.index');
Route::get('/admin/subcategories/create', [AdminSubCategoryController::class, 'create'])->name('admin.subcategory.create');
Route::post('/admin/subcategories/save', [AdminSubCategoryController::class, 'save'])->name('admin.subcategory.save');
Route::get('/admin/subcategories/edit/{id}', [AdminSubCategoryController::class, 'edit'])->name('admin.subcategory.edit');
Route::post('/admin/subcategories/update', [AdminSubCategoryController::class, 'update'])->name('admin.subcategory.update');
Route::get('/admin/subcategories/status/{id}', [AdminSubCategoryController::class, 'status'])->name('admin.subcategory.status');
Route::get('/admin/subcategories/delete/{id}', [AdminSubCategoryController::class, 'delete'])->name('admin.subcategory.delete');


// Frontend Routes
Route::get('/about-us',[HomeController::class,'about_us'])->name('about-us');
Route::get('/contact-us',[HomeController::class,'contact_us'])->name('contact-us');
Route::get('/login',[HomeController::class,'login_page'])->name('login');
Route::get('/register',[HomeController::class,'register_page'])->name('register');
Route::get('/account',[HomeController::class,'account'])->name('account');


Route::get('/product-details/{id}',[ProductController::class,'product_details'])->name('product-details');
Route::get('/product-list-by-league/{id}',[ProductController::class,'product_list_by_league'])->name('product-list-by-league');
Route::get('/product-list-by-team/{id}',[ProductController::class,'product_list_by_team'])->name('product-list-by-team');
Route::get('/product-list-by-country/{id}',[ProductController::class,'product_list_by_country'])->name('product-list-by-country');
Route::get('/product-list-others/{id}',[ProductController::class,'product_list_others'])->name('product-list-others');
Route::get('/product-filter',[ProductController::class,'product_filter'])->name('product-filter');
Route::get('/product-filter-others',[ProductController::class,'product_filter_others'])->name('product-filter-others');
Route::get('/cart',[CartController::class,'cart'])->name('cart');
Route::post('/add-to-cart', [CartController::class, 'add_to_cart'])->name('add-to-cart');
Route::get('/remove-from-cart/{product_id}', [CartController::class,'remove_from_cart'])->name('remove-from-cart');
Route::post('/update-cart', [CartController::class, 'update_cart'])->name('update-cart');
Route::get('/clear-cart', [CartController::class, 'clear_cart'])->name('clear-cart');


Route::get('/checkout',[CheckoutController::class,'checkout'])->name('checkout');
Route::get('/checkout/check/email',[CheckoutController::class,'checkout_check_email'])->name('checkout.check.email');
Route::post('/checkout-account-create-or-login',[CheckoutController::class,'checkout_account_create_or_login'])->name('checkout-account-create-or-login');
Route::post('/process-payment', [CheckoutController::class, 'process_payment'])->name('process-payment');
Route::get('/success', [CheckoutController::class, 'success'])->name('success');
Route::get('/cancel', [CheckoutController::class, 'cancel'])->name('cancel');


