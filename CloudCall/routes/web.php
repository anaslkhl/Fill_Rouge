<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\callFedbackController;
use App\Http\Controllers\CallLogsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\heyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RouteConroller;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('client-page');
});

Route::get('/catalog', [RouteConroller::class, 'catalog']);
Route::get('/dashboard', [RouteConroller::class, 'dashboard']);
Route::get('/loginForm', [LoginController::class, 'loginShow'])->name('login.form');




Route::get('/home', [ClientController::class, 'home'])->name('client.home');
Route::get('/dashboard/agent', [AgentController::class, 'myclients'])->name('dashboard.agent');
Route::view('/dashboard/supervisor', 'supervisor-dashboard')->name('dashboard.supervisor');
Route::view('/dashboard/admin', 'admin-dashboard')->name('dashboard.admin');
Route::view('/client/callform', 'callform')->name('client.callform');
Route::view('client', 'client-page')->name('client.page');

Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
Route::get('/client/{uuid}', [ClientController::class, 'home'])->name('client.home');
Route::post('/user/register', [LoginController::class, 'register'])->name('user.register');

Route::post('/user/login', [LoginController::class, 'login'])->name('user.login');
Route::get('/user/logout', [LoginController::class, 'logout'])->name('user.logout');

Route::get('/agent/call', [AgentController::class, 'myclients'])->name('agent.call');

Route::post('/call/{uuid?}', [CallLogsController::class, 'startCall'])->name('call.start');


Route::get('/call/{uuid}', [ClientController::class, 'call'])->name('client.call');
Route::post('/feedback/{call}', [callFedbackController::class, 'store'])
    ->name('feedback.store');

Route::post('/call/{log}/end', [CallLogsController::class, 'endCall'])->name('call.end');
