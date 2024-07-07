<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowroomController;

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


Route::get('get-showrooms',[ShowroomController::class,'getShowrooms']);
Route::get('get-showrooms/{id}',[ShowroomController::class,'getShowroomsById']);
Route::put('update-showrooms/{id}',[ShowroomController::class,'updateShowroom']);
Route::delete('delete-showrooms/{id}',[ShowroomController::class,'deleteShowroom']);