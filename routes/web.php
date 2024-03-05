<?php

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Auth::routes();

Route::any('/sendmail', [App\Http\Controllers\UserController::class, 'sendmail'])->name('sendmail');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::any('home', function() {
    return redirect('/dashboard');
});

// Route::any('/', [App\Http\Controllers\UserController::class, 'homepage'])->name('homepage');
Route::any('/', [App\Http\Controllers\UserController::class, 'landing'])->name('landing');
Route::any('/waitlist', [App\Http\Controllers\UserController::class, 'waitlist'])->name('waitlist');
Route::any('/overview', [App\Http\Controllers\UserController::class, 'overview'])->name('overview');
Route::any('/refer_friend', [App\Http\Controllers\UserController::class, 'refer_friend'])->name('refer_friend');

Route::any('/setpassword', [App\Http\Controllers\UserController::class, 'setpassword'])->name('setpassword');
Route::any('/subscribe', [App\Http\Controllers\UserController::class, 'subscribe'])->name('subscribe');
Route::any('/faq', [App\Http\Controllers\UserController::class, 'faq'])->name('faq');
Route::any('/dashboard', [App\Http\Controllers\UserController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::any('/referraldashboard', [App\Http\Controllers\UserController::class, 'referraldashboard'])->name('referraldashboard')->middleware('auth');
Route::any('/referraldashboardnoauth', [App\Http\Controllers\UserController::class, 'referraldashboard'])->name('referraldashboard');
Route::any('/verify/{slug}', [App\Http\Controllers\UserController::class, 'verify'])->name('verify');
Route::any('/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');

Route::any('generate_uid',function() {
    $users = User::all();
    foreach($users as $user) {
        $uid = Str::uuid();
        $user->uid = $uid;
        $user->save();
    }
});
Route::any('/{slug}', [App\Http\Controllers\UserController::class, 'refer_home'])->name('refer_home');

// Email Verification Routes...
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed', 'throttle:6,1'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
