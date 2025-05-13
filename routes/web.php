<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CodeController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::post('/logout',[UserController::class,'logout'])->name('logout');

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

Route::middleware('auth')->group(function () {
    Route::get('/admin',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/users',[AdminController::class,'users'])->name('admin.users');
    Route::get('/admin/courses',[AdminController::class,'courses'])->name('admin.courses');
    Route::get('/admin/courses/show/{id}',[AdminController::class,'coursesShow'])->name('admin.coursesShow');
    Route::post('/admin/course/{course}/training-program',[AdminController::class,'courseTrainingProgram'])->name('admin.courseTrainingProgram');


    Route::get('/admin/users/{user}/courses', [AdminController::class, 'userCourses'])->name('admin.users.userCourses');
    Route::get('/admin/users/{user}/edit-courses', [AdminController::class, 'editCourses'])->name('admin.users.editCourses');
    Route::post('/admin/users/{user}/update-courses', [AdminController::class, 'updateCourses'])->name('admin.users.updateCourses');
});

    Route::get('/course/{id}/learn',[CourseController::class,'courseLearn'])->name('course_learn');

    // compiler course
    Route::post('/execute-php', [CodeController::class, 'executePHP']);
    Route::post('/execute-python', [CodeController::class, 'executePython']);
