<?php

use App\Http\Controllers\BodegaController;
use App\Http\Controllers\HomeController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


/** ============> ENDPOINTS SIN AUTENTICACION <============================= */


Route::get('/', [HomeController::class, 'index'])->name('home');
//Route::get('bodegas', [HomeController::class, 'index']);






//Route::get('/login', [LoginController::class, 'index'])->name('login');
//Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');


//Auth::routes();

/** ============> ENDPOINTS CON AUTENTICACION <============================= */
Route::group(['middleware' => 'auth:sanctum'], function () {

    


  

});


