<?php

use App\Http\Middleware\ManageRolesMiddleware;
use App\Http\Middleware\UserReadMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\NominaController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\UserController;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware([ManageRolesMiddleware::class])->group(function () {
    Route::get('Admin/roles/assign', [RoleController::class, 'assignRolesForm'])->name('roles.assign');
    Route::post('Admin/roles/assign', [RoleController::class, 'assignRoles']);
    Route::get('Admin/roles', [RoleController::class, 'index']);
    Route::get('Admin/roles/create', [RoleController::class, 'create']);
    Route::post('Admin/roles', [RoleController::class, 'store']);
    Route::get('Admin/roles/{role}', [RoleController::class, 'show']);
    Route::get('Admin/roles/{role}/edit', [RoleController::class, 'edit']);
    Route::put('Admin/roles/{role}', [RoleController::class, 'update']);
    Route::delete('Admin/roles/{role}', [RoleController::class, 'destroy']);
});




Route::middleware(['auth'])->group(function () {
    Route::get('Admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('Admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('Admin/users', [UserController::class, 'store'])->name('users.store');
    Route::get('Admin/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::get('Admin/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('Admin/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('Admin/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::resource('nominas', NominaController::class);
        Route::get('nominas/create', [NominaController::class, 'create'])->name('nominas.create');
        Route::get('nominas/create', [NominaController::class, 'create'])->name('nominas.create');
        Route::get('nominas/confirmacion', [NominaController::class, 'createConfirmation'])->name('nominas.confirmacion');
    });
});

Route::middleware([UserReadMiddleware::class])->group(function () {
        Route::resource('informes', InformeController::class);
        Route::get('informes/export', [InformeController::class, 'export'])->name('informes.export');
    
});


