<?php

namespace App\Http\Controllers\Message;

use App\Components\Core\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Models\UserRoute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCreditController extends Controller
{
    use ResponseHelpers;


    public function selfCredit(){
        $credit = [];
        $credit['activecredit'] = UserRoute::selfUserCredit()->where([
            'status'=>true,
        ])->sum('balance');
 
        $credit['total'] = UserRoute::selfUserCredit()->sum('balance');
     
        return $this->respondLoad($credit);
    }
}
