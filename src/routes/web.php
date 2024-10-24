<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ContadorController;
use App\Http\Controllers\AssetController;



Route::get('/', function () {
    return view('landing');
});

Route::middleware('permission:see-panel')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pull-events', [EventController::class, 'pullEvents'])->name('pull-events');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});

// Rutas de la aplicación

// // // Ruta para el contador inicial
// Route::get('/contador', function () {
//     return view('contador', ['número' => 0]);
// })->name('contador');

// // Ruta para incrementar el contador con validación para no superar 10
// Route::get('/contador/{número}/inc', function ($número) {
//     if ($número < 10) {
//         $número++;
        
//     }
//     return view('contador', ['número' => $número]);
// })->name('contador.inc');

// // Ruta para decrementar el contador con validación para no bajar de 0
// Route::get('/contador/{número}/dec', function ($número) {
//     if ($número > 0) {
//         $número--;
//     }
//     return view('contador', ['número' => $número]);
// })->name('contador.dec');

// // Ruta para reiniciar el contador a cero
// Route::get('/contador/reset', function () {
//     return view('contador', ['número' => 0]);
// })->name('contador.reset');

// // Ruta para duplicar el valor del contador, con límite de 10
// Route::get('/contador/{número}/duplicate', function ($número) {
//     $número = min($número * 2, 10); // Duplicar, pero máximo 10
//     return view('contador', ['número' => $número]);
// })->name('contador.duplicate');

// Ruta para restablecer el contador a un valor específico
Route::get('/contador/set/{número}', function ($número) {
    return view('contador', ['número' => $número]);
})->name('contador.set');

Route::get('/contador', function () {
    return view('contador', ['número' => 0]);
})->name('contador');

// Cambiamos las rutas para que llamen al controlador
Route::get('/contador/{número}/inc', [ContadorController::class, 'incrementar'])->name('contador.inc');
Route::get('/contador/{número}/dec', [ContadorController::class, 'decrementar'])->name('contador.dec');
Route::get('/contador/reset', [ContadorController::class, 'reset'])->name('contador.reset');
Route::get('/contador/{número}/duplicate', [ContadorController::class, 'duplicar'])->name('contador.duplicate');
Route::resource('assets', AssetController::class)->middleware('auth');

