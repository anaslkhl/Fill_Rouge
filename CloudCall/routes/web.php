<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RouteConroller;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/catalog', [RouteConroller::class, 'catalog']);
Route::get('/dashboard', [RouteConroller::class, 'dashboard']);
Route::get('/login', [LoginController::class, 'loginShow']);