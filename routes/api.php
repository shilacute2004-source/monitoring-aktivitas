<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserActivityController;

Route::get('/get-waiting-session', [UserActivityController::class, 'getWaitingSession']);
Route::get('/session/{id}', [UserActivityController::class, 'getSession']);
Route::post('/start-session/{id}', [UserActivityController::class, 'startSession']);
Route::post('/update-session/{id}', [UserActivityController::class, 'updateSession']);
Route::post('/finish-session/{id}', [UserActivityController::class, 'finishSession']);
