<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\GroupController;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Models\Group;
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

// Route::get('events/{id}', function ($id) {
//     return new EventResource(Event::findOrFail($id));
// });

// Route::get('/', [UserController::class, 'index'])->name('home');

// Route::resource('groups', GroupController::class)->only('index');
// Route::get('/groups?is_slack=true', [GroupController::class, 'is_slack']);
// Route::resource('events', EventController::class)->only('index', 'show');

// Route::get('events', [EventController::class, 'index'])->name('events');
// Route::get('events/{event}', [EventController::class, 'show'])->name('single-event');
// Route::get('hangout', [EventController::class, 'hangout'])->name('hangout');

// Route::get('about', [UserController::class, 'about'])->name('about');
