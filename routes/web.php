<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ClienteController;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClientMail;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// usuarios
Route::get('usuarios', [UsuarioController::class, 'index'])->name('usuarios.index');
Route::get('usuarios/listar', [UsuarioController::class, 'listar'])->name('usuarios.listar');
Route::post('usuarios', [UsuarioController::class, 'guardarUsuario'])->name('usuarios.guardar');
Route::get('usuarios/{id}/obtener', [UsuarioController::class, 'obtenerUsuario'])->whereNumber('id');

//clientes
Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('clientes/listar', [ClienteController::class, 'listar'])->name('clientes.listar');
Route::post('clientes', [ClienteController::class, 'guardarCliente'])->name('clientes.guardar');
Route::get('clientes/{id}/obtener', [ClienteController::class, 'obtenerCliente'])->whereNumber('id');


//mensajes
Route::post('clientes', [ClienteController::class, 'guardarClienteForm'])->name('clientes.guardar');


