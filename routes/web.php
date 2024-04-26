<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Frontend\HomeController;
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
Route::get('/room-details/{id}',[RoomController::class,'details'])->name('room.details');

Route::get('/admin', [AuthController::class, 'login_page'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
Route::middleware(['auth'])->group(function () {
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/bookings', [RoomController::class, 'bookings'])->name('bookings');

// Admin category routes
Route::get('/admin/rooms', [RoomController::class, 'index'])->name('admin.rooms.index');
Route::get('/admin/rooms/create', [RoomController::class, 'create'])->name('admin.rooms.create');
Route::post('/admin/rooms/save', [RoomController::class, 'save'])->name('admin.rooms.save');
Route::get('/admin/rooms/edit/{id}', [RoomController::class, 'edit'])->name('admin.rooms.edit');
Route::post('/admin/rooms/update', [RoomController::class, 'update'])->name('admin.rooms.update');
Route::get('/admin/rooms/delete/{id}', [RoomController::class, 'delete'])->name('admin.rooms.delete');
Route::get('/admin/rooms/status/{id}', [RoomController::class, 'status'])->name('admin.rooms.status');
Route::post('/admin/room/image-delete',[RoomController::class,'image_delete'])->name('admin.rooms.image-delete');
Route::post('/admin/room/image-multiple-delete',[RoomController::class,'image_multiple_delete'])->name('admin.rooms.image-multiple-delete');

Route::get('/admin/user/{type}', [UserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/user/{type}/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/user/save', [UserController::class, 'save'])->name('admin.users.save');
Route::get('/admin/user/edit/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
Route::post('/admin/user/update', [UserController::class, 'update'])->name('admin.users.update');
Route::get('/admin/user/delete/{id}', [UserController::class, 'delete'])->name('admin.users.delete');

Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('user-logout');
Route::get('/user-dashboard', [DashboardController::class, 'user_dashboard'])->name('user.dashboard');
Route::get('/user-bookings', [RoomController::class, 'user_bookings'])->name('user.bookings');
Route::get('/delete-booking/{id}', [RoomController::class, 'delete_bookings'])->name('admin.delete.booking');
});

// Frontend Routes
Route::get('/user-login', [AuthController::class, 'user_login_page'])->name('user.login.page');
Route::post('/user-login', [AuthController::class, 'user_login'])->name('user.login');
Route::get('/user-register', [AuthController::class, 'user_register_page'])->name('user.register.page');
Route::post('/user-register', [AuthController::class, 'user_register'])->name('user.register');

Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');

Route::get('/room',[HomeController::class,'room'])->name('room');
Route::get('/room-details/{id}',[HomeController::class,'room_details'])->name('room-details');
Route::get('/booking/{id}',[HomeController::class,'booking'])->name('booking');
Route::post('/book',[HomeController::class,'book_room'])->name('book');
Route::get('/success', [HomeController::class, 'success'])->name('success');
Route::get('/cancel', [HomeController::class, 'cancel'])->name('cancel');
Route::get('/service',[HomeController::class,'service'])->name('service');
Route::get('/team',[HomeController::class,'team'])->name('team');
Route::get('/testimonial',[HomeController::class,'testimonial'])->name('testimonial');


