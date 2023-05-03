<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
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

Route::get('groups', [GroupController::class, 'index']);
Route::post('groups/store', [UserController::class, 'store']);
Route::post('groups/{group:id}/update', [UserController::class, 'update']);
Route::get('groups/{group:id}/delete', [UserController::class, 'delete']);

Route::get('events', [EventController::class, 'index']);
Route::post('events/store', [GroupController::class, 'store']);
Route::post('events/{event:id}/update', [GroupController::class, 'update']);
Route::get('events/{event:id}/delete', [GroupController::class, 'delete']);

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

Route::get('login', [SessionController::class, 'create'])->middleware('guest');
Route::post('login', [SessionController::class, 'store'])->middleware('guest');

Route::get('logout', [SessionController::class, 'destroy'])->middleware('auth');
