<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\StudentController;

// =====================
// SUPERADMIN ROUTES
// =====================
Route::prefix('tce/superadmin')->group(function () {

    // Dashboard
    Route::get('/', [SuperadminController::class, 'dashboard'])->name('superadmin.dashboard');

    // Club operations
    Route::match(['get', 'post'], '/clubs/{action?}/{id?}', [SuperadminController::class, 'clubs'])->name('superadmin.clubs');

    // Event operations
    Route::match(['get', 'post'], '/events/{action?}/{id?}', [SuperadminController::class, 'events'])->name('superadmin.events');

    // Faculty operations
    Route::match(['get', 'post'], '/faculties/{action?}/{id?}', [SuperadminController::class, 'faculties'])->name('superadmin.faculties');

    // Student operations
    Route::match(['get', 'post'], '/students/{action?}/{id?}', [SuperadminController::class, 'students'])->name('superadmin.students');

    // View club enrollments
    Route::get('/enrollments', [SuperadminController::class, 'enrollments'])->name('superadmin.enrollments');
});

// =====================
// STUDENT ROUTES
// =====================
Route::prefix('tce/student')->group(function () {
    Route::get('/', [StudentController::class, 'index'])->name('student.index');
    Route::get('/events', [StudentController::class, 'events'])->name('student.events');
    Route::get('/enroll', [StudentController::class, 'showEnrollForm'])->name('student.enroll.form');
    Route::post('/enroll', [StudentController::class, 'enroll'])->name('student.enroll.submit');
    Route::get('/clubs', [StudentController::class, 'showAllClubs'])->name('student.clubs.all');
    Route::get('/clubs/{id}', [StudentController::class, 'viewClubDetails'])->name('student.clubs.show');
Route::get('/events/{id}', [StudentController::class, 'showEventDetails'])->name('student.event.details');


});