<?php

use App\Http\Controllers\AuthApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::get('/get_clients', [AuthApiController::class, 'index']);
Route::post('/save_client', [AuthApiController::class, 'store']);
Route::get('/show_client/{id}', [AuthApiController::class, 'show']);
Route::put('/update_client/{id}', [AuthApiController::class, 'update']);
Route::delete('/delete_client/{id}', [AuthApiController::class, 'destroy']);
