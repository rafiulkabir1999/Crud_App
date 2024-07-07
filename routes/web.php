<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShowroomController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/register',[AuthController::class,'register'])->name('auth.register');
Route::post('/register',[AuthController::class,'storeUser'])->name('auth.storeUser');


Route::get('/login',[AuthController::class,'index'])->name('auth.login');
Route::post('/login',[AuthController::class,'check'])->name('auth.check');


Route::middleware([])->group(function(){
    Route::prefix('showrooms')->group(function(){
        Route::get('/',[ShowroomController::class,'index'])->name('showrooms.index');
        Route::get('/show/{id}',[ShowroomController::class,'show'])->name('showrooms.show');
        Route::get('/create',[ShowroomController::class,'create'])->name('showrooms.create');
        Route::post('/store',[ShowroomController::class,'store'])->name('showrooms.store');
        Route::get('/edit/{id}',[ShowroomController::class,'edit'])->name('showrooms.edit');
        Route::put('/update/{id}',[ShowroomController::class,'update'])->name('showrooms.update');
        Route::delete('/delete/{id}',[ShowroomController::class,'destroy'])->name('showrooms.destroy');
    });
});