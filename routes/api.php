<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoleController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Rutas públicas (sin autenticación)
Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
});

// Rutas protegidas (requieren autenticación)
Route::middleware('auth:sanctum')->group(function () {
    // Autenticación
    Route::prefix('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout']);
        Route::get('/me', [AuthController::class, 'me']);
        Route::get('/verify', [AuthController::class, 'verify']);
        Route::post('/register', [AuthController::class, 'register'])->middleware('permission:users.create');
    });

    // Gestión de Usuarios
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index'])->middleware('permission:users.read');
        Route::get('/statistics', [UserController::class, 'statistics'])->middleware('permission:users.read');
        Route::get('/options', [UserController::class, 'options'])->middleware('permission:users.read');
        Route::get('/{id}', [UserController::class, 'show'])->middleware('permission:users.read');
        Route::post('/', [UserController::class, 'store'])->middleware('permission:users.create');
        Route::put('/{id}', [UserController::class, 'update'])->middleware('permission:users.update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->middleware('permission:users.delete');
        Route::patch('/{id}/toggle-status', [UserController::class, 'toggleStatus'])->middleware('permission:users.update');
    });

    // Gestión de Roles
    Route::prefix('roles')->group(function () {
        Route::get('/', [RoleController::class, 'index'])->middleware('permission:roles.read');
        Route::get('/statistics', [RoleController::class, 'statistics'])->middleware('permission:roles.read');
        Route::get('/permissions', [RoleController::class, 'permissions'])->middleware('permission:roles.read');
        Route::get('/{id}', [RoleController::class, 'show'])->middleware('permission:roles.read');
        Route::post('/', [RoleController::class, 'store'])->middleware('permission:roles.create');
        Route::put('/{id}', [RoleController::class, 'update'])->middleware('permission:roles.update');
        Route::delete('/{id}', [RoleController::class, 'destroy'])->middleware('permission:roles.delete');
        Route::patch('/{id}/toggle-status', [RoleController::class, 'toggleStatus'])->middleware('permission:roles.update');
    });

    // Rutas de prueba
    Route::get('/health', function () {
        return response()->json([
            'success' => true,
            'message' => 'API funcionando correctamente',
            'timestamp' => now(),
            'version' => '1.0.0'
        ]);
    });
});

// Ruta de prueba para verificar conectividad
Route::get('/health', function () {
    return response()->json([
        'success' => true,
        'message' => 'API funcionando correctamente',
        'timestamp' => now(),
        'version' => '1.0.0'
    ]);
});
