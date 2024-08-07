<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('users/export/', [UserController::class, 'export']);

Route::controller(AuthController::class)->group(function() {
    Route::get('/login', 'login')->name('login');
    Route::post('/login', 'loginUser')->name('loginUser');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerUser')->name('registerUser');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(StudentController::class)->group(function() {
    Route::get('/students', 'index')->name('students.index');
    Route::post('/students', 'store')->name('students.store');
    Route::get('/students/export', 'export')->name('students.export');
});