<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StripeController;
use App\Models\Subscribe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;


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

Route::post('/stripe/payment', [StripeController::class, 'createPaymentIntent']);

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

// Product Category Route
Route::post('/create-category', [App\Http\Controllers\ProductController::class, 'createCategory']);
Route::get('/fetch-categories', [App\Http\Controllers\ProductController::class, 'fetchCategory']);
Route::any('/delete-category/{id}', [App\Http\Controllers\ProductController::class, 'deleteCategory']);

// Product Route
Route::post('/create-product', [App\Http\Controllers\ProductController::class, 'createProduct']);
Route::post('/edit-product', [App\Http\Controllers\ProductController::class, 'editProduct']);
Route::get('/fetch-products', [App\Http\Controllers\ProductController::class, 'fetchProduct']);
Route::get('/fetch-single-product/{product_id}', [App\Http\Controllers\ProductController::class, 'fetchSingleProduct']);
Route::get('/fetch-product/{category_id}', [App\Http\Controllers\ProductController::class, 'fetchProductWithCategory']);
Route::any('/delete-products', [App\Http\Controllers\ProductController::class, 'deleteProduct']);

// Blog Route
Route::post('/create-blog', [App\Http\Controllers\ProductController::class, 'createBlog']);
Route::post('/edit-blog', [App\Http\Controllers\ProductController::class, 'editBlog']);
Route::get('/fetch-blogs', [App\Http\Controllers\ProductController::class, 'fetchBlog']);
Route::get('/fetch-single-blog/{blog_id}', [App\Http\Controllers\ProductController::class, 'fetchSingleBlog']);
Route::get('/fetch-blog-by-category/{category}', [App\Http\Controllers\ProductController::class, 'fetchBlogWithCategory']);
Route::any('/delete-blog/{id}', [App\Http\Controllers\ProductController::class, 'deleteBlog']);

// Contact Route
Route::post('/add-contactus', [App\Http\Controllers\ProductController::class, 'createContactUs']);
Route::get('/fetch-contactus', [App\Http\Controllers\ProductController::class, 'fetchContactUs']);

//Order Route
Route::post('/save-order', [App\Http\Controllers\ProductController::class, 'save_orders']);
Route::any('/fetch-single-order', [App\Http\Controllers\ProductController::class, 'fetch_single_order']);
Route::get('/fetch-all-orders', [App\Http\Controllers\ProductController::class, 'fetch_all_orders']);

Route::any('/create_product/{product?}', [App\Http\Controllers\ProductController::class, 'create_product'])->name('create_product');
Route::any('/make_payment/{price_id?}', [App\Http\Controllers\ProductController::class, 'make_payment'])->name('make_payment');
Route::any('/success_payment', [App\Http\Controllers\ProductController::class, 'success_payment'])->name('success_payment');
Route::any('/failed_payment', [App\Http\Controllers\ProductController::class, 'failed_payment'])->name('failed_payment');
Route::any('/update-order-status', [App\Http\Controllers\ProductController::class, 'updateOrderStatus'])->name('failed_payment');

Route::post('/stripe/combined_payment', [ProductController::class, 'createPayment']);