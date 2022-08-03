<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->group(function() {
    Route::get('/', [App\Http\Controllers\UsersController::class, 'index']);
    Route::get('/{user}', [App\Http\Controllers\UsersController::class, 'show']);
    Route::post('/new', [App\Http\Controllers\UsersController::class, 'store']);
    Route::put('/edit/{user}', [App\Http\Controllers\UsersController::class, 'update']);
    Route::delete('/delete/{user}', [App\Http\Controllers\UsersController::class, 'destroy']);
});

Route::prefix('empresas')->group(function() {
    Route::get('/', [App\Http\Controllers\EmpresasController::class, 'index']);
    Route::get('/{empresas}', [App\Http\Controllers\EmpresasController::class, 'show']);
    Route::post('/new', [App\Http\Controllers\EmpresasController::class, 'store']);
    Route::put('/edit/{empresas}', [App\Http\Controllers\EmpresasController::class, 'update']);
    Route::delete('/delete/{empresas}', [App\Http\Controllers\EmpresasController::class, 'destroy']);
});
