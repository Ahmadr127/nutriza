<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will be
| assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\Public\LandingController;
use App\Http\Controllers\Public\LeadController;

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::post('/lead/submit', [LeadController::class, 'store'])->name('lead.store');



// Authentication routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    

    // User Management routes
    Route::middleware('permission:manage_users')->group(function () {
        Route::resource('users', UserController::class);
    });

    // Role Management routes
    Route::middleware('permission:manage_roles')->group(function () {
        Route::resource('roles', RoleController::class);
    });

    // Permission Management routes
    Route::middleware('permission:manage_permissions')->group(function () {
        Route::resource('permissions', PermissionController::class);
    });

    // Landing Page Admin Routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('site-settings', \App\Http\Controllers\Admin\SiteSettingController::class);
        Route::resource('diet-menus', \App\Http\Controllers\Admin\DietMenuController::class);
        Route::resource('diet-programs', \App\Http\Controllers\Admin\DietProgramController::class);
        Route::resource('testimonials', \App\Http\Controllers\Admin\TestimonialController::class);
    });

});
