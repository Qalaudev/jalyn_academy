<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('/login',[UserController::class,'login'])->name('login');
Route::post('/login',[UserController::class,'authenticate'])->name('authenticate');

Route::get('/register',[UserController::class,'register'])->name('register');
Route::post('/register',[UserController::class,'authorization'])->name('authorization');
