<?php

use App\Http\Controllers\Message\UserCreditController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Auth::routes();
Route::get('self-credit',[UserCreditController::class,'selfcredit']);

Route::get('/test',[TestController::class,'check']);
Route::get('/{any}', [App\Http\Controllers\AppController::class, 'index'])->where('any','.*');
