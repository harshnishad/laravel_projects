<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;  
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile management routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    // List Users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    // Show Form to Add User
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    
    // Store New User
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    
    // Show Form to Edit User
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    
    // Update User
    Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
    
    // Delete User
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

require __DIR__.'/auth.php';
