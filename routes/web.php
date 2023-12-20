<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PostController;
use App\Http\Controllers\Front\SigninController;
use App\Http\Controllers\Front\SignupController;
use App\Http\Controllers\User\SignoutController;
use App\Http\Controllers\User\DashboardController;

// use App\Http\Middleware\CheckPermission;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[HomeController::class, 'home'])->name('front.home');
//
Route::get('signin', [SigninController::class, 'view'])->name('front.signin');
Route::post('signin', [SigninController::class, 'authenticate']);
//
Route::get('signup', [SignupController::class, 'view'])->name('front.signup');
Route::post('signup', [SignupController::class, 'store']);
//
// Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('user.dashboard');
    Route::post('/signout', [SignoutController::class, 'signout'])->name('user.signout');
// });

/*
Route::get('/dashboard', function () {
    // This route requires the 'view-dashboard' permission.
})->middleware('checkPermission:access-dashboard');

Route::middleware('checkOwnership:post')->group(function () {
    Route::get('/dashboard/posts/{id}/edit', [PostController::class,'edit']);
});
*/
