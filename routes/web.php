<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\MikrotikController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleControl;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'index']);

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [SessionController::class, 'index'])->name('login');
    Route::post('/login', [SessionController::class, 'login']);
    Route::get('/register', [SessionController::class, 'register']);
    Route::post('/register/create', [SessionController::class, 'create']);
});

Route::middleware(['auth'])->group(function(){
    Route::get('/menu',[MenuController::class,'index']);
    Route::get('/logout',[SessionController::class,'logout']);

    Route::get('/active-con',[MikrotikController::class,'showPPPOE']);
    Route::get('/interface',[MikrotikController::class,'showLogs']);
    Route::resource('/role-management',RoleControl::class);
});
