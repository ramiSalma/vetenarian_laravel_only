<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/admin',function(){
//     return view('admin');
// });

// Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
// Route::post('/admin/login', [AdminAuthController::class, 'login']);
// Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// // Protected admin route (dashboard)
// Route::middleware(['auth:admin'])->group(function () {
//     Route::get('/admin/dashboard', function () {
//         return view('admin'); // create this view
//     });
// });

use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth:admin')->get('/admin/dashboard', function () {
    return view('admin');
});

Route::middleware('auth:veterinarian')->get('/veterinarian/dashboard', function () {
    return view('veterinarian');
});

Route::middleware('auth:client')->get('/client/dashboard', function () {
    return view('client');
});