<?php

use App\Http\Controllers\EletrodomesticosController;
use App\Http\Controllers\MarcasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/eletrodomestico')->controller(EletrodomesticosController::class)->group(function (){
    Route::post('/store', 'store');
    Route::get('/index', 'index')->name('eletrodomesticos.index');
    Route::get('/edit/{eletrodomestico}', 'edit');
    Route::put('/update/{eletrodomestico}', 'update');
    Route::delete('/destroy/{eletrodomestico}', 'destroy');
});

Route::prefix('/marcas')->controller(MarcasController::class)->group(function(){
    Route::get('/index', 'index');
});