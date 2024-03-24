<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

# login
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.process');
Route::post('logout', [LoginController::class, 'destroy'])->name('logout');

Route::group(['middleware' => 'auth'], function () {
    # main
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    # task
    Route::get('task/history', [TaskController::class, 'history'])->name('task.history');
    Route::resource('task', TaskController::class);

    # approvals
    Route::resource('approval', ApprovalController::class)->only(['index', 'show', 'store']);

    # notifications
    Route::resource('notification', NotificationController::class)->only('index', 'show');

    # profile
    Route::resource('profile', ProfileController::class)->only('index', 'update'); # done
    Route::resource('password', PasswordController::class)->only('index', 'update'); # done
});
