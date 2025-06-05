<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('layouts.app'); // Arahkan ke layout utama Anda
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

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

Route::get('/students', function () {
    return view('students.students');
})->name('students');

Route::get('/profile', function () {
    return view('profile.profile');
})->name('profile');

Route::resource('teachers', TeacherController::class);
Route::post('teachers/{id}/change-password', [TeacherController::class, 'changePassword'])->name('teachers.change-password');
