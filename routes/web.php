<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;

Route::middleware(['App\Http\Middleware\Check'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::post('/active/{role}', [RoleController::class, 'active'])->name('active');
});
Route::middleware(['App\Http\Middleware\Check'])->group(function () {
    Route::resource('students', StudentController::class);
});

Route::middleware(['App\Http\Middleware\Check'])->group(function () {
    Route::resource('cars', CarController::class);
});

Route::middleware(['App\Http\Middleware\Check'])->group(function () {
    Route::resource('posts', PostController::class);

});

Route::middleware(['App\Http\Middleware\Check'])->group(function () {
    Route::resource('news', NewsController::class);

});

Route::middleware(['App\Http\Middleware\Check'])->group(function () {
    Route::resource('products', ProductController::class);

});




Route::get('/main', function ()  {
    return view('layout.main');
});


Route::get('/', [UserPostController::class, 'index']);

// Login and Register
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout']);

