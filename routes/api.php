<?php
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Subscribe;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//previous routes used for the waiting list project

Route::get('/alluser', [App\Http\Controllers\ApiController::class, 'alluser']);
Route::get('/getuser', [App\Http\Controllers\ApiController::class, 'getuser']);
//The formal method for subscribing for users is now converted to the auth/register while the real auth/register get commented

//for password reset
Route::post('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class,'sendResetLinkEmailApi'])->name('resetpassword');
//new routes
//authentication
// Route::post('/auth/register', [App\Http\Controllers\Auth\LoginController::class, 'createUser']);
Route::post('/auth/login', [App\Http\Controllers\Auth\LoginController::class, 'loginUser']);
Route::post('/auth/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::any('/auth/logout', [App\Http\Controllers\UserController::class, 'logout'])->name('logout');
Route::post('/profile', [App\Http\Controllers\UserController::class, 'profile'])->name('profile')->middleware('auth:sanctum');

Route::post('password/reset-password', [App\Http\Controllers\Auth\ForgotPasswordController::class,'reset'])->name('resetpasswordfield');
Route::post('/forgot-password', [App\Http\Controllers\UserController::class, 'forgot_password']);

Route::get('/fetch_user_details/{email}', [App\Http\Controllers\WorkshopController::class, 'fetch_user_details'])->name('fetch_user_details');

// Product Route
Route::post('/create-product', [App\Http\Controllers\ProductController::class, 'createProduct']);
Route::get('/fetch-product', [App\Http\Controllers\ProductController::class, 'fetchProduct']);
Route::get('/fetch-product/{category_id}', [App\Http\Controllers\ProductController::class, 'fetchProductWithCategory']);