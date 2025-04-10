<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

// Grupo de rutas para autenticación
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth',
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('register', [AuthController::class, 'register']);

    // Listado de usuarios
    Route::get('usuarios', [AuthController::class, 'index']);

    // Modificación de datos
    Route::middleware('auth:api')->put('update', [AuthController::class, 'update']);

    // Eliminación de usuario
    Route::middleware('auth:api')->delete('delete/{id}', [AuthController::class, 'destroy']);
});

// Grupo de rutas protegidas para Posts
Route::middleware('auth:api')->group(function () {
    Route::get('posts', [PostController::class, 'index']);        // Listar todos los posts
    Route::post('posts', [PostController::class, 'store']);       // Crear un nuevo post
    Route::get('posts/{id}', [PostController::class, 'show']);    // Ver detalles de un post
    Route::put('posts/{id}', [PostController::class, 'update']);  // Actualizar un post
    Route::delete('posts/{id}', [PostController::class, 'destroy']); // Eliminar un post
});
