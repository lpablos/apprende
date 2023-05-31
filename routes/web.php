<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermisosController;

Auth::routes();
Route::get('/', function () {
    return view('/auth/login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/error_route', [App\Http\Controllers\HomeController::class, 'error_route'])->name('error_route');

Route::group(['middleware' => ['rol:Administracion']], function () {

    Route::get('/roles/get-roles', [RolesController::class, 'getRoles'])->name('get-roles');
    Route::resource('roles', RolesController::class)->names('roles');
    
    Route::resource('permisos', PermisosController::class)->names('permisos');

});







