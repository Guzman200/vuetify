<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\TransportadorController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/** =====>  Endpoints sin autenticación <======= */

//Route::post('/login', [LoginController::class, 'login']);

Route::get('users', [UserController::class, 'index']);

Route::get('get-datos-grafica', [UserController::class, 'datosGrafica']);


/** =====>  Endpoints con autenticación <======= */

Route::group(['middleware' => 'auth:sanctum'], function () {

    //Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});
