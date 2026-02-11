<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('index');
});

/**
 * Auth
 */
Route::get('/login', [LoginController::class, 'show'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');

Route::get('/register', [RegisterController::class, 'show'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// routes/web.php

Route::prefix('vendor')->group(function () {
  Route::get('/', fn() => view('vendor.index'));
  Route::get('/productos', fn() => view('vendor.index'));
  Route::get('/pedidos', fn() => view('vendor.index'));
  Route::get('/envios', fn() => view('vendor.index'));
  Route::get('/tienda', fn() => view('vendor.index'));
  Route::get('/perfil', fn() => view('vendor.index'));
});


Route::prefix('demo/admin')->group(function () {
    Route::get('/', fn() => view('admin.index'));

    // (después haremos vistas reales por página)
    Route::get('/usuarios', fn() => view('admin.index')); // por ahora muestra dashboard
    Route::get('/productos', fn() => view('admin.index'));
    Route::get('/pedidos', fn() => view('admin.index'));
    Route::get('/reportes', fn() => view('admin.index'));
    Route::get('/configuracion', fn() => view('admin.index'));
});