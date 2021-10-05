<?php

use App\Http\Controllers\NotificationController;
use App\Imports\ContactImportUpload;
use App\Models\User;
use App\Models\UserRoute;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Route;

// Auth::routes();
Route::get('/testing/testing',[NotificationController::class,'myNotification']);

Route::get('/testing-credit',function(){

    $date = "2021-01-22";
    $time = "17:22";
    $combinedDT = date('Y-m-d H:i:s', strtotime("$date $time"));
    return $combinedDT;
    $credits = UserRoute::where('user_id',1)
    ->where('validity','>=',Carbon::today())      //removing expired credits
    ->where('status',true) 
    ->orderBy('validity','asc')                   //getting in asc order so that we can deduct from the low validatiy date
    ->get();

    $totalRequestedCredit = 21;
    $requestCredits = 21;
    $remaingtotal = $credits->sum('balance')-$credits->sum('used');
    $counter = 1;
    for($index=0;$requestCredits!=0;$index++){
            $remaing = $credits[$index]->balance-$credits[$index]->used;
            $nunoValue = $requestCredits;
            $requestCredits = $requestCredits -$remaing; 


            //get how far is the number from zero ......
            //how many credit still  required to make request credit zero 
            
            //update all used 
            if($requestCredits<0){
                $requestCredits = 0;
                return $nunoValue;
                //update used as + $requestedCredits
            }
           $counter++;
    }


    return "total running counter". $nunoValue;
});


Route::get('/{any}', [App\Http\Controllers\AppController::class, 'index'])->where('any','.*');
