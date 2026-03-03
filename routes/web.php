<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\PueblosController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\UserController;

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
// Pueblos
Route::get('/pueblos', [PueblosController::class, 'index']);
Route::get('/pueblos/{id}', [PueblosController::class, 'show']);

Route::get('/perfil',[PerfilController::class,'perfil'])->name('perfil')->middleware('auth');
Route::post('perfil/perfil-edit', [PerfilController::class, 'edit'])->name('edit')->middleware('auth');
Route::post('/perfil/update-avatar', [UserController::class, 'updateAvatar'])->name('perfil.update-avatar')->middleware('auth');

Route::post('/events', [EventsController::class, 'store'])->name('events.store')->middleware('admin');
Route::put('/events/{id}', [EventsController::class, 'update'])->name('events.update')->middleware('admin');
Route::delete('/events/{id}', [EventsController::class, 'destroy'])->name('events.destroy')->middleware('admin');

// Admin
Route::get('/admin', [AdminController::class, 'admin'])->name('admin')->middleware('admin');
Route::get('/admin/users', [AdminController::class, 'allusers'])->name('allusers')->middleware('admin');
Route::get('/admin/registeruser', [AdminController::class, 'registeruser'])->name('registeruser')->middleware('admin');
Route::get('/admin/pueblos', [AdminController::class, 'allpueblos'])->name('allpueblos')->middleware('admin');
Route::post('/admin/update-user/{id}', [AdminController::class, 'updateUser'])->name('users.update')->middleware('admin');
Route::delete('/admin/users/{id}', [AdminController::class, 'destroyUser'])->name('delete-user')->middleware('admin');
Route::post('/admin/update-pueblo/{id}', [AdminController::class, 'updatePueblo'])->name('pueblo.update')->middleware('admin');
Route::delete('/admin/pueblo/{id}', [AdminController::class, 'destroyPueblo'])->name('delete-pueblo')->middleware('admin');
Route::get('/admin/eventos', [AdminController::class, 'allevents'])->name('allevents')->middleware('admin');
Route::post('/admin/update-event/{id}', [AdminController::class, 'updateEvent'])->name('Event.update')->middleware('admin');
Route::delete('/admin/eventos/{id}', [AdminController::class, 'destroyEvent'])->name('delete-event')->middleware('admin');

Auth::routes();
