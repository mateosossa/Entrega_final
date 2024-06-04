<?php
use App\Http\Middleware\Middleware5;
use App\Http\Middleware\Middleware4;
use App\Http\Middleware\Middleware3;
use App\Http\Middleware\Middleware2;
use App\Http\Middleware\ManageRolesMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\NominaController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\UserController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Parte de esteban 
//Middleware Admin
Route::middleware([ManageRolesMiddleware::class])->group(function () {
    Route::get('Admin/roles/assign', [RoleController::class, 'assignRolesForm'])->name('roles.assign');
    Route::post('Admin/roles/assign', [RoleController::class, 'assignRoles']);
    Route::get('Admin/roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('Admin/roles/create', [RoleController::class, 'create'])->name('roles.create');
    Route::post('Admin/roles', [RoleController::class, 'store'])->name('roles.store');
    Route::get('Admin/roles/{role}', [RoleController::class, 'show'])->name('roles.show');
    Route::get('Admin/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
    Route::put('Admin/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
    Route::delete('Admin/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
});

Route::middleware([Middleware3::class])->group(function () {
    Route::get('Admin/users', [UserController::class, 'index'])->name('users.index');
});

Route::middleware([Middleware2::class])->group(function () {
    Route::get('Admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('Admin/users', [UserController::class, 'store'])->name('users.store');
    Route::get('Admin/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('Admin/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('Admin/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('Admin/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::middleware([Middleware5::class])->group(function () {
Route::resource('nominas', NominaController::class);
    Route::get('admin/nominas', [NominaController::class, 'index'])->name('nominas.index');
});

Route::middleware([Middleware2::class])->group(function () {
    Route::get('admin/nominas/create', [NominaController::class, 'create'])->name('nominas.create');
    Route::post('admin/nominas', [NominaController::class, 'store'])->name('nominas.store');
    Route::get('admin/nomina/{nominas}', [NominaController::class, 'show'])->name('nominas.show');
    Route::get('admin/nomina/{nominas}/edit', [NominaController::class, 'edit'])->name('nominas.edit');
    Route::put('admin/nomina/{nominas}', [NominaController::class, 'update'])->name('nominas.update');
    Route::delete('admin/nomina/{nominas}', [NominaController::class, 'destroy'])->name('nominas.destroy');
});

Route::middleware([Middleware4::class])->group(function () {
Route::resource('informes', InformeController::class);
    Route::get('informes', [InformeController::class, 'index'])->name('informes.index');
});

Route::middleware([Middleware2::class])->group(function () {
    
    Route::get('informes/{informes}', [InformeController::class, 'show'])->name('informes.show');
    Route::put('informes/{informes}', [InformeController::class, 'update'])->name('informes.update');
});






