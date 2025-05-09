<?php

use App\Http\Controllers\DogController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminAppointmentController;
use App\Http\Controllers\AdminAdoptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

// Public routes
Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/adoption', function () {
    return view('adoption');
})->name('adoption');

// Admin routes - all using consistent 'admin.' prefix
Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('ADMIN.dashboard');
    })->name('dashboard');
    
    // Dogs management
    Route::resource('dogs', DogController::class);
    
    // Adoptions management
    Route::resource('adoptions', AdminAdoptionController::class);
    Route::patch('adoptions/{adoption}/approve', [AdminAdoptionController::class, 'approve'])->name('adoptions.approve');
    Route::patch('adoptions/{adoption}/reject', [AdminAdoptionController::class, 'reject'])->name('adoptions.reject');
    
    // Appointments management
    Route::resource('appointments', AdminAppointmentController::class);
});

// Client routes
Route::middleware('auth:client')->prefix('client')->name('client.')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    // Client appointments
    Route::resource('appointments', AppointmentController::class);
});

// Veterinarian routes
Route::middleware(['auth:veterinarian'])->prefix('veterinarian')->name('vet.')->group(function () {
    Route::get('/dashboard', [AppointmentController::class, 'index'])->name('dashboard');
    Route::post('/appointments/{appointment}/status', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');
});

// Public appointment routes
Route::resource('appointment', AppointmentController::class);    


