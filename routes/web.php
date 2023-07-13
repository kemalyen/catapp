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


Auth::routes([
    'register' => false, // Register Routes...
    'reset' => false, // Reset Password Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->middleware(['web', 'auth'])
    ->name('home');

Route::get('/edit', [App\Http\Controllers\HomeController::class, 'edit'])
    ->middleware(['web', 'auth', 'role:Admin'])
    ->name('edit');

Route::post('/edit', [App\Http\Controllers\HomeController::class, 'update'])
    ->middleware(['web', 'auth', 'role:Admin'])
    ->name('update');
