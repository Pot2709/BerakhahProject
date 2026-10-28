<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClientMail;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PruebaController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // usuarios
    Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('usuarios/listar', [UsuarioController::class, 'listar'])->name('usuarios.listar');
    Route::post('usuarios', [UsuarioController::class, 'guardarUsuario'])->name('usuarios.guardar');
    Route::get('usuarios/{id}/obtener', [UsuarioController::class, 'obtenerUsuario'])->whereNumber('id');

    //clientes
    // Panel administrativo
    Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('clientes/listar', [ClienteController::class, 'listar'])->name('clientes.listar');
    Route::post('clientes', [ClienteController::class, 'guardarCliente'])->name('clientes.guardar');
    Route::get('clientes/exportar', [ClienteController::class, 'exportarExcel'])->name('clientes.exportar');
    Route::get('clientes/{id}/obtener', [ClienteController::class, 'obtenerCliente'])->whereNumber('id');
    Route::delete('clientes/{id}', [ClienteController::class, 'eliminarCliente'])->whereNumber('id');
});

require __DIR__.'/auth.php';



//mensajes
Route::post('contacto', [ClienteController::class, 'guardarClienteForm'])->middleware(['throttle:5,1', 'throttle:contacto-diario'])->name('clientes.guardar');

//Route::get('pruebaCorreo', [PruebaController::class, 'enviarCorreo'])->name('correo.enviar');
