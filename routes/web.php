<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'index'])->name('home');

Route::get('groups', [GroupController::class, 'index'])->name('groups');
Route::get('slacks',[GroupController::class, 'slack'])->name('slacks');

Route::get('events', [EventController::class, 'index'])->name('events');
Route::get('events/{event}', [EventController::class, 'show'])->name('single-event');
Route::get('hangout', [EventController::class, 'hangout'])->name('hangout');

Route::get('about', [UserController::class, 'about'])->name('about');