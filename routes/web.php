<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [CustomerController::class,'Index'])->name('customer.login');

Route::prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/', 'Index')->name('admin.login');
    Route::get('/admin-login', 'Index')->name('admin.login');
    Route::post('/admin-login', 'processAdminLogin')->name('admin.login');
    Route::get('/admin-register', 'Registration')->name('admin.register');
    Route::post('/admin-register', 'processAdminRegistration')->name('admin.register');
    Route::group(['middleware' => 'auth:admins'], function () {
        Route::get('/admin-product', 'Product')->name('admin.product');
        Route::post('/admin-delete-product', 'deleteProduct')->name('admin.deleteProduct');
        Route::post('/admin-edit-product', 'editProduct')->name('product.edit');
        Route::post('/admin-add-product', 'store')->name('product.add');
        Route::post('/admin-logout', 'signOut')->name('admin.logout');
    });
});

Route::prefix('customer')->controller(CustomerController::class)->group(function () {
    Route::get('/', 'Index')->name('customer.login');
    Route::get('/login', 'Index')->name('customer.login');
    Route::post('/login', 'processCustomerLogin')->name('customer.login');
    Route::get('/customer-register', 'Registration')->name('customer.register');
    Route::post('/customer-register', 'processCustomerRegistration')->name('customer.register');
    Route::group(['middleware' => 'auth:users'], function () {
        Route::get('/customer-product', 'Product')->name('customer.product');
        Route::post('/customer-logout', 'signOut')->name('customer.logout');
    });
});

Auth::routes();
