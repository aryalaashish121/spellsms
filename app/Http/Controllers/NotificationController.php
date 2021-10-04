<?php

namespace App\Http\Controllers;

use App\Components\Core\ResponseHelpers;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    use ResponseHelpers;
   
    public function myNotification(){
        $notifications = auth()->user()->notifications;
            return $this->respondOk($notifications);
    }

    public function unreadNotification(){

    }

    public function makeNotificationRead(){

    }
    
    public function deleteNotification(){

    }

    public function deleteAllNotification (){

    }
}
