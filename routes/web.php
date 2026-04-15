<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserActivityController;

Route::get('/', function () {
    return view('input');
});

Route::post('/store', [UserActivityController::class, 'store']);
Route::get('/dashboard/{id}', [UserActivityController::class, 'dashboard']);
Route::get('/api/get-waiting-session', [UserActivityController::class, 'getWaitingSession']);
Route::get('/api/session/{id}', [UserActivityController::class, 'getSession']);
Route::post('/api/restart-session/{id}', [UserActivityController::class, 'restartSession']);
Route::get('/end-session', function () {
    return redirect('/');
});