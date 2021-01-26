<?php

use App\Http\Controllers\EmpleadosController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/Empleados', [EmpleadosController::class, 'index']);
Route::post('/Empleados/store', [EmpleadosController::class, 'store']);
Route::post('/Empleados/update', [EmpleadosController::class, 'update']);
Route::delete('/Empleados/destroy/{id}', [EmpleadosController::class, 'destroy']);
Route::get('/Empleados/show/{id}', [EmpleadosController::class, 'show']);
