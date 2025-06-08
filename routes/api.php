<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::middleware("guest")->group(function () {

    Route::post('/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('register');

    Route::post('/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('login');

    Route::get('/operations/credits', function () {
    return response()->json([
        'operations' => \App\Enums\OperationEnum::listOfCredits()
    ]);
});

});

Route::middleware(['auth:sanctum'])->group(function () {
    
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

Route::get('/user', function (Request $request) {
    return $request->user();
});

});
