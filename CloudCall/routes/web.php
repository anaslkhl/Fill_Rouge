<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\CallLogsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\heyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RouteConroller;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/catalog', [RouteConroller::class, 'catalog']);
Route::get('/dashboard', [RouteConroller::class, 'dashboard']);
Route::get('/loginForm', [LoginController::class, 'loginShow'])->name('login.form');




Route::get('/home', [ClientController::class, 'home'])->name('client.home');
Route::view('/dashboard/agent', 'agent-dashboard')->name('dashboard.agent');
Route::view('/dashboard/supervisor', 'supervisor-dashboard')->name('dashboard.supervisor');
Route::view('/dashboard/admin', 'admin-dashboard')->name('dashboard.admin');
Route::view('/client/callform', 'callform')->name('client.callform');


Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
Route::get('/client/{uuid}', [ClientController::class, 'home'])->name('client.home');
Route::post('/user/register', [LoginController::class, 'register'])->name('user.register');

Route::post('/user/login', [LoginController::class, 'login'])->name('user.login');
Route::get('/user/logout', [LoginController::class, 'logout'])->name('user.logout');

Route::get('/agent/call', [AgentController::class, 'myclients'])->name('agent.call');

Route::post('/call/{id}', [CallLogsController::class, 'startCall'])->name('call.start');
