<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HelloController;

// Default Route
Route::get('/', function () {
    return view('welcome');
});

// HelloController Route
Route::get('/hello', [HelloController::class, 'index']);

// User Management Routes
Route::resource('users', UserController::class);

// Project Management Routes
Route::resource('projects', ProjectController::class);


Route::get('projects/{project}/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); // Show Create Task Form
Route::post('projects/{project}/tasks', [TaskController::class, 'store'])->name('tasks.store'); // Store New Task
Route::get('tasks/{task}', [TaskController::class, 'show'])->name('tasks.show'); // Show Single Task
Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); // Show Edit Task Form
Route::patch('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update'); // Update Task
Route::delete('tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy'); // Delete Task
