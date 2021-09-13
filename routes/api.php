<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  
    return $request->user();
});

Route::get('/check',function(){
    // if(!auth()->user()){
    //     abort('you are not qualified',403);
    // }

    $response_data = [
       [
        'name'=>"Aashish", 'emai'=>'email@gmail.com','id'=>""
    ]
    ];
    $data = ['success' => true, 'message' => "Data fetched successfully",'data'=>$response_data];
    return response()->json($data,200);
});

