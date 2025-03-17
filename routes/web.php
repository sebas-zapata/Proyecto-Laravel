<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index'); // Mostrar lista
    Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create'); // Formulario de creación
    Route::post('/productos', [ProductoController::class, 'store'])->name('productos.store'); // Guardar producto
    Route::get('/productos/{producto}', [ProductoController::class, 'show'])->name('productos.show'); // Ver producto
    Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit'); // Formulario de edición
    Route::put('/productos/{producto}', [ProductoController::class, 'update'])->name('productos.update'); // Actualizar producto
    Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy'); // Eliminar producto

    // Ruta personalizada para confirmar eliminación
    Route::get('/productos/{producto}/confirmar', [ProductoController::class, 'confirmarEliminacion'])
        ->name('productos.confirmarEliminacion');
});

Route::post('/logout', function () {
    Auth::logout();
    session()->invalidate(); // Invalida la sesión
    session()->regenerateToken(); // Regenera el token CSRF
    return redirect('/login');
})->name('logout');

require __DIR__ . '/auth.php';
