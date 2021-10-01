<?php

use App\Imports\ContactImportUpload;
use App\Models\User;
use Illuminate\Support\Facades\Route;

// Auth::routes();
Route::get('/testing',function(){
    
    return User::getMyTree();
});


Route::get('/{any}', [App\Http\Controllers\AppController::class, 'index'])->where('any','.*');
