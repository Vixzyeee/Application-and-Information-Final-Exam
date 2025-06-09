<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('layouts.app'); // Arahkan ke layout utama Anda
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Admin routes
Route::prefix('admin')->group(function () {
    // Guest routes (accessible when not logged in)
    Route::middleware('guest:admin')->group(function () {
        Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
        Route::post('/login', [AdminController::class, 'login']);
        Route::get('/register', [AdminController::class, 'showRegistrationForm'])->name('admin.register');
        Route::post('/register', [AdminController::class, 'register']);
    });

    // Protected routes (require admin authentication)
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
        
        // Profile routes
        Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
        Route::put('/profile', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
        Route::put('/password', [AdminController::class, 'updatePassword'])->name('admin.password.update');
        Route::delete('/profile', [AdminController::class, 'destroyProfile'])->name('admin.profile.destroy');
        
        // Teacher management routes
        Route::get('/teachers/create', [AdminController::class, 'showCreateTeacherForm'])->name('admin.teachers.form');
        Route::post('/teachers/create', [AdminController::class, 'createTeacher'])->name('admin.teachers.create');
    });
});

// Teachers routes
Route::prefix('teachers')->group(function () {
    Route::get('/', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::post('/', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
    Route::get('/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::put('/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
    Route::delete('/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
    Route::post('/{teacher}/change-password', [TeacherController::class, 'changePassword'])->name('teachers.change-password');
});

Route::prefix('students')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('students.index');
    Route::get('/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/', [StudentController::class, 'store'])->name('students.store');
    Route::get('/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::post('/{student}/change-password', [StudentController::class, 'changePassword'])->name('students.change-password');
});

Route::get('/profile', function () {
    return view('profile.profile');
})->name('profile');
