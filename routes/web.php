<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DenunciasAController;
use App\Http\Controllers\DenunciasMController;
use App\Http\Controllers\LandingPage;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ValoracionesController;
use App\Models\Empleats;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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


Route::get('/login-google', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/google-callback', function () {
    Auth::guard('web');
    $user = Socialite::driver('google')->user();
    $userExists = Empleats::where('email', $user->email)->first();
    if ($userExists){
        Auth::login($userExists);
        return redirect('/welcome');
    }
    return redirect('/');
});


Route::view('/', 'auth.login');
Route::get('/welcome', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);
Route::resource('empleat', \App\Http\Controllers\EmpleatsController::class);
Route::resource('product', ProductController::class);
Route::resource('mensaje', MensajeController::class);
Route::resource('valoraciones', ValoracionesController::class);
Route::resource('denunciaM', DenunciasMController::class);
Route::resource('denunciaA', DenunciasAController::class);
Route::resource('categoria', \App\Http\Controllers\CategoriasController::class);

Route::get('logoutUser', [LoginController::class, 'logout'])->name('logoutUser');
Route::get('/delete/{id}', [\App\Http\Controllers\UserController::class,'destroy']);
Route::get('/deleteProduct/{id}', [\App\Http\Controllers\ProductController::class,'destroy']);
Route::get('/deleteDenunciaA/{id}/{tipo}', [\App\Http\Controllers\DenunciasAController::class,'destroy']);
Route::get('/deleteDenunciaM/{id}/{tipo}', [\App\Http\Controllers\DenunciasMController::class,'destroy']);
Route::get('/deleteMensaje/{id}', [\App\Http\Controllers\MensajeController::class,'destroy']);
Route::get('/deleteEmpleado/{id}', [\App\Http\Controllers\EmpleatsController::class,'destroy']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
