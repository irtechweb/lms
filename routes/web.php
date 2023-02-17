<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

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

Route::middleware('auth')->group(function () {
    Route::post('free-plan', [App\Http\Controllers\Auth\RegisteredUserController::class, 'freeMemberShipPlan'])->name('free-plan');
});

Route::middleware(['auth'])->group(function () {
     Route::get('vprofile', function () {
        return view('profile');
    })->name('vprofile');
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
     Route::get('landing', [\App\Http\Controllers\SiteController::class, 'index'])
        ->name('index');
    Route::get('profile', [\App\Http\Controllers\SiteController::class, 'profile'])
           // ->middleware('password.confirm')
            ->name('profile');

    Route::get('editprofile', function () {
        return view('editprofile');
    })->name('editprofile');
    Route::post('editprofile', [App\Http\Controllers\Auth\RegisteredUserController::class, 'update']);


    Route::get('course', [App\Http\Controllers\CourseController::class, 'couseView'])->name('course');
    Route::get('home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');
    Route::get('course-lesson/{id}', [App\Http\Controllers\HomeController::class, 'courseLesson'])->name('course-lesson');
    Route::get('course-lesson-number/{id}/{lesson_id}', [App\Http\Controllers\HomeController::class, 'courseLesson'])->name('course-lesson-number');
    Route::get('save_lesson_notes', [App\Http\Controllers\HomeController::class, 'saveLessonNotes']);
    Route::get('signupfree', [AuthenticatedSessionController::class, 'signUpFree']);
    // {user_id}/{subscription_id}

   
    Route::get('calendly', [App\Http\Controllers\HomeController::class, 'calendly'])->name('calendly');
    Route::get('calendly', [App\Http\Controllers\HomeController::class, 'calendly'])->name('calendly');

    Route::get('membership-plans', [App\Http\Controllers\SubscriptionController::class, 'membershipPlans'])->name('membershipPlans');
    Route::post('payment-details', [App\Http\Controllers\SubscriptionController::class, 'paymentDetails'])->name('paymentDetails');
  //  Route::post('payment-details', [App\Http\Controllers\SubscriptionController::class, 'paymentDetails'])->name('paymentDetails');
    Route::post('payment', [App\Http\Controllers\SubscriptionController::class, 'savePaymentDetails'])->name('savePaymentDetail');
//    Route::get('paywithpaypal', [App\Http\Controllers\SubscriptionController::class, 'paywithpaypal'])->name('paywithpaypal');
    Route::post('paypal', [App\Http\Controllers\SubscriptionController::class, 'postPaymentWithpaypal'])->name('postPaymentWithpaypal');
    Route::get('paypal', [App\Http\Controllers\SubscriptionController::class, 'getPaymentStatus'])->name('status');
    Route::get('book-slot', [App\Http\Controllers\BookingController::class, 'bookSlot'])->name('bookSlot');
    Route::post('bookwithpaypal', [App\Http\Controllers\BookingController::class, 'postPaymentWithpaypal'])->name('bookwithpaypal');
    Route::get('bookwithpaypal', [App\Http\Controllers\BookingController::class, 'getPaymentStatus'])->name('bookstatus');
    Route::get('webinars', [App\Http\Controllers\WebinarController::class, 'getWebinars'])->name('getWebinars');
Route::post('book-webinar', [App\Http\Controllers\WebinarController::class, 'bookWebinar'])->name('bookWebinar');


Route::get('/deleteWebinar/{id}', [\App\Http\Controllers\Admin\WebinarController::class, 'deleteWebinar'])->name('deleteWebinar');
Route::post('/createBooking', [\App\Http\Controllers\BookingController::class, 'createBooking'])->name('createBooking');

Route::get('book-slot', [App\Http\Controllers\BookingController::class, 'bookSlot'])->name('bookSlot');
Route::post('book-slot', [App\Http\Controllers\BookingController::class, 'bookPaymentSlot'])->name('paybookSlot');

Route::get('practise', [App\Http\Controllers\HomeController::class, 'practise'])->name('practise');

});


