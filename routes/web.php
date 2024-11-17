<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Login
Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
Route::get('/create-user-login', [LoginController::class, 'create'])->name('login.create-user');
Route::post('/store-user-login', [LoginController::class, 'store'])->name('login.store-user');

// Recuperar senha
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPassword'])->name('forgot-password.show');
Route::post('/forgot-password', [ForgotPasswordController::class, 'submitForgotPassword'])->name('forgot-password.submit');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPassword'])->name('reset-password.submit');

Route::group(['middleware' => 'auth'], function () {

    // Dashboard
    Route::get('/index-dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Perfil
    Route::get('/show-profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/update-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/edit-profile-password', [ProfileController::class, 'editPassword'])->name('profile.edit-password');
    Route::put('/update-profile-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    // Usuários
    Route::group(['middleware' => 'role:Super Admin|Admin|Professor|Tutor'], function () {
        Route::get('/index-user', [UserController::class, 'index'])->name('user.index');
        Route::get('/show-user/{user}', [UserController::class, 'show'])->name('user.show');
    });

    Route::group(['middleware' => 'role:Super Admin|Admin'], function () {
        Route::get('/create-user', [UserController::class, 'create'])->name('user.create');
        Route::post('/store-user', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update');
        Route::get('/edit-user-password/{user}', [UserController::class, 'editPassword'])->name('user.edit-password');
        Route::put('/update-user-password/{user}', [UserController::class, 'updatePassword'])->name('user.update-password');
        Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    });

    Route::group(['middleware' => 'role:Super Admin|Admin|Professor'], function () {
        Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update');
    });

    // Cursos
    Route::group(['middleware' => 'role:Super Admin|Admin|Professor|Tutor|Aluno'], function () {
        Route::get('/index-course', [CourseController::class, 'index'])->name('course.index');
        Route::get('/show-course/{course}', [CourseController::class, 'show'])->name('course.show');
        Route::get('/edit-course/{course}', [CourseController::class, 'edit'])->name('course.edit');
    });

    Route::group(['middleware' => 'role:Super Admin|Admin|Professor|Tutor'], function () {
        Route::get('/create-course', [CourseController::class, 'create'])->name('course.create');
        Route::post('/store-course', [CourseController::class, 'store'])->name('course.store');
        Route::put('/update-course/{course}', [CourseController::class, 'update'])->name('course.update');
        Route::delete('/destroy-course/{course}', [CourseController::class, 'destroy'])->name('course.destroy');
    });

    // Aulas
    Route::group(['middleware' => 'role:Super Admin|Admin|Professor|Tutor|Aluno'], function () {
        Route::get('/index-classe/{course}', [ClasseController::class, 'index'])->name('classe.index');
        Route::get('/show-classe/{classe}', [ClasseController::class, 'show'])->name('classe.show');
        Route::get('/create-classe/{course}', [ClasseController::class, 'create'])->name('classe.create');
        Route::post('/store-classe', [ClasseController::class, 'store'])->name('classe.store');
        Route::get('/edit-classe/{classe}', [ClasseController::class, 'edit'])->name('classe.edit');
        Route::put('/update-classe/{classe}', [ClasseController::class, 'update'])->name('classe.update');
        Route::delete('/destroy-classe/{classe}', [ClasseController::class, 'destroy'])->name('classe.destroy');
    });

        // Papéis
        Route::get('/index-role', [RoleController::class, 'index'])->name('role.index')->middleware('permission:index-role'); 
        Route::get('/create-role', [RoleController::class, 'create'])->name('role.create')->middleware('permission:create-role'); 
        Route::post('/store-role', [RoleController::class, 'store'])->name('role.store')->middleware('permission:create-role'); 
        Route::get('/edit-role/{role}', [RoleController::class, 'edit'])->name('role.edit')->middleware('permission:edit-role'); 
        Route::put('/update-role/{role}', [RoleController::class, 'update'])->name('role.update')->middleware('permission:edit-role'); 
        Route::delete('/destroy-role/{role}', [RoleController::class, 'destroy'])->name('role.destroy')->middleware('permission:destroy-role'); 
    });

