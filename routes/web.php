<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('company')->group(function () {
    Route::get('/', [App\Http\Controllers\EmpresasController::class, 'index'])->name('company.index');
    Route::get('/new', [App\Http\Controllers\EmpresasController::class, 'create'])->name('company.create');
    Route::post('/new', [App\Http\Controllers\EmpresasController::class, 'store'])->name('company.store');
    Route::get('/edit/{empresas}', [App\Http\Controllers\EmpresasController::class, 'edit'])->name('company.edit');
    Route::put('/edit/{empresas}', [App\Http\Controllers\EmpresasController::class, 'update'])->name('company.update');
    Route::delete('/delete/{empresas}', [App\Http\Controllers\EmpresasController::class, 'destroy'])->name('company.destroy');
});

Route::prefix('users')->group(function () {
    Route::get('/', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
    Route::get('/new', [App\Http\Controllers\UsersController::class, 'create'])->name('users.create');
    Route::post('/new', [App\Http\Controllers\UsersController::class, 'store'])->name('users.store');
    Route::get('/edit/{user}', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
    Route::put('/edit/{user}', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
    Route::delete('/delete/{user}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.destroy');

    Route::post('/user/company/{user}', [App\Http\Controllers\UsersController::class, 'userCompany'])->name('users.company');
});
