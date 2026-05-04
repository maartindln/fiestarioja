<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\PrivController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\Pueblos\PueblosController;
use App\Http\Controllers\Pueblos\ListpController;
use App\Http\Controllers\Festivos\FestivosController;
use App\Http\Controllers\Festivos\ListeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rutas Públicas Principales
Route::get('/', [HomeController::class, 'inicio'])->name('index');
Route::post('/mails/contacto', [ContactoController::class, 'enviar'])->name('contacto.enviar');

Route::get('/politicas/privacidad', [PrivController::class, 'politicas'])->name('priv');
Route::get('/politicas/terminos', [PrivController::class, 'terminos'])->name('term');

Route::get('/calendario', [CalendarController::class, 'calendario'])->name('calendar');

// Pueblos (Vistas Públicas) - Manejadas por ListpController
Route::get('/listadop', [ListpController::class, 'listadop'])->name('listp');
Route::get('/listadop/search', [ListpController::class, 'psearch'])->name('pueblos.search');
Route::get('/pueblos/{id}', [PueblosController::class, 'showp']); // Detalle individual

// Festivos/Eventos (Vistas Públicas)
Route::get('/listadoe', [ListeController::class, 'listadoe'])->name('liste');
Route::get('/listadoe/search', [ListeController::class, 'esearch'])->name('eventos.search');
Route::get('/eventos/{id}', [FestivosController::class, 'showe']);

// Perfil y Autenticación de Usuario
Route::middleware('auth')->group(function () {
    Route::get('/perfil', [PerfilController::class, 'perfil'])->name('perfil');
    Route::post('perfil/perfil-edit', [PerfilController::class, 'edit'])->name('edit');
    Route::post('/perfil/update-avatar', [UserController::class, 'updateAvatar'])->name('perfil.update-avatar');
});

// --- ZONA ADMIN (Protegida por Middleware auth y admin) ---
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    
    Route::get('/', [AdminController::class, 'admin'])->name('admin');

    // Gestión de Usuarios
    Route::get('/users', [AdminController::class, 'allusers'])->name('allusers');
    Route::get('/registeruser', [AdminController::class, 'registeruser'])->name('registeruser');
    Route::post('/update-user/{id}', [AdminController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{id}', [AdminController::class, 'destroyUser'])->name('delete-user');

    // Gestión de Pueblos - Acciones procesadas por PueblosController
    Route::get('/pueblos', [AdminController::class, 'allpueblos'])->name('allpueblos');
    Route::get('/registrarpueblo', [AdminController::class, 'registrarpueblo'])->name('admin.registrarpueblo');
    Route::post('/registrarpueblo', [PueblosController::class, 'store'])->name('pueblos.store');
    Route::put('/update-pueblo/{id}', [PueblosController::class, 'update'])->name('pueblos.update');
    Route::delete('/pueblo/{id}', [PueblosController::class, 'destroy'])->name('delete-pueblo');

    // Gestión de Eventos - Acciones procesadas por EventsController
    Route::get('/eventos', [AdminController::class, 'allevents'])->name('allevents');
    Route::get('/registrarevento', [AdminController::class, 'registrarevento'])->name('admin.registrarevento');
    Route::post('/eventos', [EventsController::class, 'store'])->name('events.store');
    Route::put('/update-event/{id}', [EventsController::class, 'update'])->name('events.update');
    Route::delete('/eventos/{id}', [EventsController::class, 'destroy'])->name('delete-event');

});

Auth::routes();