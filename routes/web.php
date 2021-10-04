<?php

use App\Http\Controllers\NotificationController;
use App\Imports\ContactImportUpload;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Auth::routes();
Route::get('/testing/testing',[NotificationController::class,'myNotification']);


Route::get('/{any}', [App\Http\Controllers\AppController::class, 'index'])->where('any','.*');
