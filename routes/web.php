<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::middleware('auth')->group(function () {
    Route::get('/',function(){
        return view('home');
    })->name('home');
    Route::get('/users',[UserController::class,'index'])->name('users.index');
    Route::get('/users/create',[UserController::class,'create'])->name('users.create');
    Route::post('/users',[UserController::class,'store'])->name('users.store');
    Route::get('/users/{user}',[UserController::class,'show'])->name('users.show');
    Route::get('/users/{user}/edit',[UserController::class,'edit'])->name('users.edit');
    Route::put('/users/{user}',[UserController::class,'update'])->name('users.update');

    Route::put('/users/{user}/profile',[UserController::class,'updateProfile'])->name('users.updateProfile');
    Route::put('/users/{user}/interest',[UserController::class,'updateInterest'])->name('users.updateInterest');
    Route::put('/users/{user}/role',[UserController::class,'updateRole'])->name('users.updateRole');
    Route::delete('/users/{user}',[UserController::class,'destroy'])->name('users.destroy');
});
