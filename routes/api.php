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

Route::get('/checkuser', [App\Http\Controllers\UserController::class, 'checkuser']);
//courses
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'loginUser'])->name('login');
Route::post('/referral_pg_reg', [App\Http\Controllers\Auth\LoginController::class, 'createUser'])->name('referral_pg_reg');

Route::post('password/reset-password', [App\Http\Controllers\Auth\ForgotPasswordController::class,'reset'])->name('resetpasswordfield');
Route::post('/forgot-password', [App\Http\Controllers\UserController::class, 'forgot_password']);

Route::get('/fetch_user_details/{email}', [App\Http\Controllers\WorkshopController::class, 'fetch_user_details'])->name('fetch_user_details');

//Route for DBA Payments
Route::any('/create_product/{product?}/{price?}/{currency?}', [App\Http\Controllers\WorkshopController::class, 'create_product'])->name('create_product');
Route::any('/make_payment/{price_id?}', [App\Http\Controllers\WorkshopController::class, 'make_payment'])->name('make_payment');
Route::any('/success_payment/', [App\Http\Controllers\WorkshopController::class, 'success_payment'])->name('success_payment');
Route::any('/failed_payment/', [App\Http\Controllers\WorkshopController::class, 'failed_payment'])->name('failed_payment');
