<?php

namespace App\Http\Controllers;

use App\Components\Core\ResponseHelpers;
use App\Models\User;
use App\Notifications\NewUserCreatedNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;

class TestController extends Controller
{
    use ResponseHelpers;
    public function check(){
      return "hekk";
        $user = User::first();
        Notification::send($user, new NewUserCreatedNotification());
        return $this->respondBadRequest("hello successfully used");
    }
}
