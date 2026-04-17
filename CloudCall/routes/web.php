<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\callFedbackController;
use App\Http\Controllers\CallLogsController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\heyController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RouteConroller;
use App\Http\Controllers\SupervisorController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('home');
// });


Route::get('/', [ClientController::class, 'home'])->name('client.home');

Route::get('/loginForm', [LoginController::class, 'loginShow'])->name('login.form');
Route::post('/user/login', [LoginController::class, 'login'])->name('user.login');
Route::get('/home', [ClientController::class, 'home'])->name('client.home');
Route::get('/catalog', [RouteConroller::class, 'catalog']);
Route::post('/user/logout', [LoginController::class, 'logout'])->name('user.logout');
Route::view('/client/callform', 'callform')->name('client.callform');
Route::view('client', 'client-page')->name('client.page');
Route::post('/client/store', [ClientController::class, 'store'])->name('client.store');
Route::get('/client/{uuid}', [ClientController::class, 'home'])->name('client.home');
Route::get('/call/{uuid}', [ClientController::class, 'call'])->name('client.call');
Route::post('/call/{uuid?}', [CallLogsController::class, 'startCall'])->name('call.start');
Route::post('/feedback/{call}', [callFedbackController::class, 'store'])->name('feedback.store');


Route::middleware(['auth'])->group(function () {



    Route::middleware(['admin'])->group(
        function () {
            Route::get('/dashboard', [AdminController::class, 'dashboard']);
            Route::get('/dashboard/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
            Route::get('/admin/registration', [LoginController::class, 'adminRegistration'])->name('admin.registration');
            Route::post('/user/register', [LoginController::class, 'register'])->name('user.register');
            Route::get('/users',                   [AdminController::class, 'users'])->name('admin.users');
            Route::patch('/users/{user}/suspend',  [AdminController::class, 'suspendUser'])->name('users.suspend');
            Route::patch('/users/{user}/activate', [AdminController::class, 'activateUser'])->name('users.activate');
        }
    );

    Route::middleware(['agent'])->group(
        function () {
            Route::get('/dashboard/agent', [AgentController::class, 'myclients'])->name('dashboard.agent');
            Route::get('/agent/call', [AgentController::class, 'myclients'])->name('agent.call');

            Route::post('/call/{log}/end', [CallLogsController::class, 'endCall'])->name('call.end');
        }
    );

    Route::middleware(['supervisor'])->group(
        function () {
            Route::get('/supervisor/dashboard', [SupervisorController::class, 'dashboard'])->name('dashboard.supervisor');
        }
    );
});
