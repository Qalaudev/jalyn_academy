<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/navbar',[HomeController::class,'navbar'])->name('navbar');

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'authenticate'])->name('authenticate');

Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register',[UserController::class,'authorization'])->name('authorization');

Route::prefix('role')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('role_index');
    Route::get('/create', [RoleController::class, 'createRoleForm'])->name('role_create_form');
    Route::post('/create', [RoleController::class, 'createRole'])->name('role_create');
    Route::get('/edit/{id}', [RoleController::class, 'editRole'])->name('role_edit');
    Route::post('/edit/{id}', [RoleController::class, 'updateRole'])->name('role_update');
    Route::delete('/delete/{id}', [RoleController::class, 'destroyRole'])->name('role_delete');
});
    Route::get('/role/show/{id}', [RoleController::class, 'showRole'])->name('role_show');

Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('course_index');
    Route::get('/create', [CourseController::class, 'createCourseForm'])->name('course_create_form');
    Route::post('/create', [CourseController::class, 'createCourse'])->name('course_create');
    Route::get('/edit/{id}', [CourseController::class, 'editCourse'])->name('course_edit');
    Route::put('/edit/{id}', [CourseController::class, 'updateCourse'])->name('course_update');
    Route::delete('/delete/{id}', [CourseController::class, 'destroyCourse'])->name('course_delete');
    Route::get('/show/{id}', [CourseController::class, 'showCourse'])->name('course_show');
});
