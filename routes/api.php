<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Authorization\RoleController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

Route::middleware('auth:sanctum')->get('/get-token',function(){
    $user = User::first();
    $token = $user->createToken($user->name)->plainTextToken;
    
    $data = [
        'message'=>"Token created successfully.",
        'user'=>$user,
        'token'=>$token
    ];
    return response($data);
});

Route::middleware('')->get('/user', function (Request $request) {
  
    return $request->user();

    //crud roles
    Route::resource('/roles', RoleController::class);
    

    //crud users
    Route::post('/user/create',[UserController::class,'store']);
    Route::put('user/update/{slug}',[UserController::class,'update']);
});

Route::resource('/roles', RoleController::class);
   //crud users
   Route::post('/user/create',[UserController::class,'store']);
   Route::put('user/update/{slug}',[UserController::class,'update']);

   Route::get('/check',[TestController::class,'check']);
  