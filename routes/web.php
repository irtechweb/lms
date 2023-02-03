<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\SiteController::class, 'index'])
        ->name('index');

require __DIR__ . '/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('profile', [\App\Http\Controllers\SiteController::class, 'profile'])
            ->middleware('password.confirm')
            ->name('profile');

    Route::get('course', [App\Http\Controllers\CourseController::class, 'couseView'])->name('course');
    Route::get('home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    Route::get('course-lesson/{id}', [App\Http\Controllers\HomeController::class, 'courseLesson'])->name('course-lesson');
    Route::get('course-lesson-number/{id}/{lesson_id}', [App\Http\Controllers\HomeController::class, 'courseLesson'])->name('course-lesson-number');
    Route::get('save_lesson_notes', [App\Http\Controllers\HomeController::class, 'saveLessonNotes']);

   
    Route::get('calendly', [App\Http\Controllers\HomeController::class, 'calendly'])->name('calendly');
    Route::get('calendly', [App\Http\Controllers\HomeController::class, 'calendly'])->name('calendly');

    Route::get('membership-plans', [App\Http\Controllers\SubscriptionController::class, 'membershipPlans'])->name('membershipPlans');
    Route::get('payment-details/{user_id}/{subscription_id}', [App\Http\Controllers\SubscriptionController::class, 'paymentDetails'])->name('paymentDetails');
    Route::post('payment', [App\Http\Controllers\SubscriptionController::class, 'savePaymentDetails'])->name('savePaymentDetail');
//    Route::get('paywithpaypal', [App\Http\Controllers\SubscriptionController::class, 'paywithpaypal'])->name('paywithpaypal');
    Route::post('paypal', [App\Http\Controllers\SubscriptionController::class, 'postPaymentWithpaypal'])->name('postPaymentWithpaypal');
    Route::get('paypal', [App\Http\Controllers\SubscriptionController::class, 'getPaymentStatus'])->name('status');
    Route::get('book-slot', [App\Http\Controllers\BookingController::class, 'bookSlot'])->name('bookSlot');
});
Route::get('webinars', [App\Http\Controllers\WebinarController::class, 'getWebinars'])->name('getWebinars');

Route::get('/deleteWebinar/{id}', [\App\Http\Controllers\Admin\WebinarController::class, 'deleteWebinar'])->name('deleteWebinar');
Route::post('/createBooking', [\App\Http\Controllers\BookingController::class, 'createBooking'])->name('createBooking');

Route::get('book-slot', [App\Http\Controllers\BookingController::class, 'bookSlot'])->name('bookSlot');
