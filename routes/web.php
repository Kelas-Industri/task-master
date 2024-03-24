<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryController;
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

# main
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

# task
Route::get('task', [TaskController::class, 'index'])->name('task.index');
Route::get('task/{task}', [TaskController::class, 'show'])->name('task.show');

# history
Route::get('history', [HistoryController::class, 'index'])->name('history.index');
Route::get('history/{history}', [HistoryController::class, 'show'])->name('history.show');

# approvals
Route::get('approval', [ApprovalController::class, 'index'])->name('approval.index');
Route::get('approval/{approval}', [ApprovalController::class, 'show'])->name('approval.show');

# notifications
Route::get('notification', [NotificationController::class, 'index'])->name('notification.index');

# profile
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('password', [PasswordController::class, 'index'])->name('password.index');
