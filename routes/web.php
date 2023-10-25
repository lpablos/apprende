<?php

use App\Http\Controllers\ProfileController;
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

// General 
Route::get('/', function () {
    return view('application/pages/home');
    // return view('application/pages/dashboard_delete_account');
})->name('home');

// Con autorizacion
// Route::get('/dashboard', function () {
//     // return view('dashboard');
//     return view('application/pages/dashboard_index_user');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Todo login
Route::middleware('auth')->group(function () {
    
    Route::prefix('dashboard')->group(function () {
        Route::get('/resumen',[ProfileController::class, 'dashboard'])->name('dashboard.index');   
        Route::get('/usuario',[ProfileController::class, 'editUser'])->name('dashboard.usuario');  
        Route::get('/password',[ProfileController::class, 'editPassword'])->name('dashboard.password');  
        Route::get('/delete-account',[ProfileController::class, 'deleteAccount'])->name('dashboard.delete.account');      
        Route::post('/usuario-update',[ProfileController::class, 'update'])->name('dashboard.usuario.update');  
        Route::delete('/baja-cuenta-usuario', [ProfileController::class, 'destroy'])->name('dashboard.baja.cuenta');
    });


    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
