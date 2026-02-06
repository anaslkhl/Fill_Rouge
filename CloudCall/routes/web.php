<?php

use App\Http\Controllers\RouteConroller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/catalog', [RouteConroller::class, 'catalog']);
Route::get('/dashboard', [RouteConroller::class, 'dashboard']);