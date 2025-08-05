<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\PueblosController;
use App\Http\Controllers\ListController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'inicio'])->name('index');
Route::post('/contacto', [ContactoController::class, 'enviar'])->name('contacto.enviar');
Route::get('/calendario', [CalendarController::class, 'calendario'])->name('calendar');

Route::get('/listado', [ListController::class, 'listado'])->name('list');
Route::get('/listado/search', [ListController::class, 'search'])->name('pueblos.search');

// Eventos
Route::get('/events', [EventsController::class, 'index']);
Route::post('/events', [EventsController::class, 'store']);
Route::get('/events/{id}', [EventsController::class, 'show']);
Route::put('/events/{id}', [EventsController::class, 'update']);
Route::delete('/events/{id}', [EventsController::class, 'destroy']);

// Pueblos
Route::get('/pueblos', [PueblosController::class, 'index']);
Route::get('/pueblos/{id}', [PueblosController::class, 'show']);
Route::post('/pueblos', [PueblosController::class, 'store']); // opcional

Auth::routes();
