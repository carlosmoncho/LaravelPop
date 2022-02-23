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
//Route::get('/products/{', \App\Http\Controllers\Api\ProductController::class);
Route::apiResource('/products', \App\Http\Controllers\Api\ProductController::class);
Route::post('newProduct', [\App\Http\Controllers\Api\ProductController::class,'store']);
Route::post('login', [\App\Http\Controllers\Api\LoginController::class, 'login']);
Route::post('register', [\App\Http\Controllers\Api\LoginController::class, 'register']);
Route::apiResource('/etiquetas', \App\Http\Controllers\Api\EtiquetaController::class);
Route::apiResource('/users', \App\Http\Controllers\Api\UserController::class);
Route::apiResource('/imagen', \App\Http\Controllers\Api\ImageController::class);
Route::apiResource('/categories', \App\Http\Controllers\Api\CategoriaController::class);
Route::apiResource('/valoraciones', \App\Http\Controllers\Api\ValoracionController::class);
Route::apiResource('/denunciasM', \App\Http\Controllers\Api\DenunciesMController::class);
Route::apiResource('/denunciasA', \App\Http\Controllers\Api\DenunciesAController::class);
Route::post('newValoracion', [\App\Http\Controllers\Api\ValoracionController::class,'store']);
Route::put('comprar', [\App\Http\Controllers\Api\ProductController::class, 'update']);
Route::apiResource('/mensajes', \App\Http\Controllers\Api\MensajesController::class);
Route::post('newComent', [\App\Http\Controllers\Api\MensajesController::class, 'store']);
Route::post('newValoracion', [\App\Http\Controllers\Api\ValoracionController::class,'store']);
Route::put('editarProfile', [\App\Http\Controllers\Api\UserController::class, 'update']);
Route::post('newComent', [\App\Http\Controllers\Api\MensajesController::class, 'store']);
Route::post('newDenunciaA', [\App\Http\Controllers\Api\DenunciesAController::class, 'store']);
Route::post('newDenunciaM', [\App\Http\Controllers\Api\DenunciesMController::class, 'store']);
