<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RouteConroller;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/catalog', [RouteConroller::class, 'catalog']);
Route::get('/dashboard', [RouteConroller::class, 'dashboard']);
Route::get('/login', [LoginController::class, 'loginShow']);




Route::view('/home', 'client-page')->name('client.home');
Route::view('/dashboard/agent', 'agent-dashboard')->name('dashboard.agent');
Route::view('/dashboard/supervisor', 'supervisor-dashboard')->name('dashboard.supervisor');
Route::view('/dashboard/admin', 'admin-dashboard')->name('dashboard.admin');
Route::view('/client/callform', 'callform')->name('client.callform');


