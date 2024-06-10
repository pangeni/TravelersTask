<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/client', [ClientController::class, 'index']);
Route::post('/client', [ClientController::class, 'store']);
Route::get('/client/{id}', [ClientController::class, 'show']);
Route::get('/client/{id}/edit', [ClientController::class, 'edit']);
Route::put('/client/{id}/update', [ClientController::class, 'update']);
Route::delete('/client/{id}/delete', [ClientController::class, 'destroy']);