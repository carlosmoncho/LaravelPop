<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LandingPage;
use App\Http\Controllers\UserController;
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

Route::view('/', 'auth.login');
Route::get('/welcome', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);

Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/delete/{id}', [\App\Http\Controllers\UserController::class,'destroy']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
