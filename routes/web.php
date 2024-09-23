<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Models\Student;

Route::get('/', function () {
    return view('auth.login');
});

Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginUser')->name('loginUser');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerUser')->name('registerUser');
    Route::post('/logout', 'logout')->name('logout')->middleware('auth');
});

Route::controller(StudentController::class)->group(function() {
    Route::middleware('auth')->group(function() {
        Route::get('/students', 'index')->name('students.index');
        Route::middleware('can:modify-students')->group(function() {
            Route::post('/students', 'store')->name('students.store');
            Route::patch('/students/{student}', 'update')->name('students.update');
            Route::get('/students/export', 'export')->name('students.export');
            Route::put('/students/import', 'import')->name('students.import');
            Route::delete('/students/{student}', 'delete')->name('students.delete');
        });
        Route::get('/students/search', 'search')->name('students.search');
        Route::get('/students/{course}/{year}', 'get')->name('students.get');
    });
});
