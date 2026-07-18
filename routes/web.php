<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;

// =========================
// Admin Controllers
// =========================
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\CourtController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\PaymentController as AdminPaymentController;
use App\Http\Controllers\Admin\ReportController;

// =========================
// User Controllers
// =========================
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\BookingController as UserBookingController;
use App\Http\Controllers\User\PaymentController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [LandingController::class, 'index'])->name('landing');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'verified',
    'role:admin'
])
->prefix('admin')
->name('admin.')
->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('courts', CourtController::class);

    Route::resource('schedules', ScheduleController::class);

    Route::resource('bookings', AdminBookingController::class);

    Route::resource('payments', AdminPaymentController::class)
        ->only([
            'index',
            'show',
            'update'
        ]);

    Route::get('/reports', [ReportController::class, 'index'])
        ->name('reports.index');

    Route::get('/reports/pdf', [ReportController::class, 'exportPdf'])
        ->name('reports.pdf');

});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'verified',
    'role:user'
])
->prefix('user')
->name('user.')
->group(function () {

    Route::get('/dashboard', [UserDashboardController::class, 'index'])
        ->name('dashboard');

    Route::resource('bookings', UserBookingController::class)
        ->only([
            'index',
            'store'
        ]);

    Route::get('/booking-history',
        [UserBookingController::class, 'history'])
        ->name('bookings.history');

    Route::get('/payments/{booking}/create',
        [PaymentController::class, 'create'])
        ->name('payments.create');

    Route::post('/payments',
        [PaymentController::class, 'store'])
        ->name('payments.store');

    Route::get('/payments/{payment}',
        [PaymentController::class, 'show'])
        ->name('payments.show');

});

/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile',
        [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile',
        [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile',
        [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

/*
|--------------------------------------------------------------------------
| Authentication
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';