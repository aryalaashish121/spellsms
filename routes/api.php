<?php

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Authorization\RoleController;
use App\Http\Controllers\Message\UserCreditController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\Template\TemplateController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Models\Template;

Route::post('/login', [AuthenticationController::class, 'login']);
Route::middleware('auth:sanctum')->get('/get-token', function () {
    $user = User::first();
    $token = $user->createToken($user->name)->plainTextToken;

    $data = [
        'message' => "Token created successfully.",
        'user' => $user,
        'token' => $token
    ];
    return response($data);
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('/roles', RoleController::class);
    //crud users
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/user/create', [UserController::class, 'store']);
    Route::put('user/update/{slug}', [UserController::class, 'update']);
    Route::post('/export-users', [UserController::class, 'export']);



    Route::get('/route', [RouteController::class, 'index']);

    Route::get('self-credit', [UserCreditController::class, 'selfCredit']);


    Route::get('/test', [TestController::class, 'check']);


    //CRUD Templates
    Route::get('/all-templates', [TemplateController::class, 'index']);
    Route::post('/add-template', [TemplateController::class, 'store']);
    Route::delete('/delete-template/{id}', [TemplateController::class, 'destroy']);
});
