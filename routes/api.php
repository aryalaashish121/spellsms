<?php

use App\Http\Controllers\Admin\AccountManagerController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Authorization\RoleController;
use App\Http\Controllers\ContactGroup\ContactGroupController;
use App\Http\Controllers\Contacts\ContactController;
use App\Http\Controllers\Message\CampaignsController;
use App\Http\Controllers\Message\SenderIdController;
use App\Http\Controllers\Message\UserCreditController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\Template\TemplateController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;



Route::post('/login', [AuthenticationController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('/roles', RoleController::class);
    //crud users
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/user/create', [UserController::class, 'store']);
    Route::put('user/update/{slug}', [UserController::class, 'update']);
    Route::post('/export-users', [UserController::class, 'export']);


    //account manager
    Route::post('/add-account-manager', [AccountManagerController::class, 'store']);
    Route::get('/account-managers', [AccountManagerController::class, 'index']);
    Route::delete('/delete/account-manager/{id}', [AccountManagerController::class, 'destroy']);

    //sender id
    Route::post('/create-senderid', [SenderIdController::class, 'store']);
    Route::get('/all-senderid', [SenderIdController::class, 'index']);
    Route::delete('/delete/senderid/{id}', [SenderIdController::class, 'destroy']);

    //campaign
    Route::get('/all-campaign-categories', [CampaignsController::class, 'getCategories']);

    Route::get('/route', [RouteController::class, 'index']);
    Route::get('/all-templates', [TemplateController::class, 'index']);
    Route::post('/add-template', [TemplateController::class, 'store']);

    Route::get('/route', [RouteController::class, 'index']);

    Route::get('self-credit', [UserCreditController::class, 'selfCredit']);


    Route::get('/test', [TestController::class, 'check']);


    //CRUD Templates
    Route::get('/all-templates', [TemplateController::class, 'index']);
    Route::post('/add-template', [TemplateController::class, 'store']);
    Route::delete('/delete-template/{id}', [TemplateController::class, 'destroy']);

    //CRUD Contact Groups
    Route::get('/all-contact-groups', [ContactGroupController::class, 'index']);
    Route::post('/add-contact-group', [ContactGroupController::class, 'store']);
    Route::delete('/delete-contact-group/{id}', [ContactGroupController::class, 'destroy']);

    //CRUD Contacts
    Route::get('/all-contacts', [ContactController::class, 'index']);
    Route::post('/add-contact', [ContactController::class, 'store']);
    Route::delete('/delete-contact/{id}', [ContactController::class, 'destroy']);
});



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
