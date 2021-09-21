<?php

namespace App\Http\Controllers\Message;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MessageController extends Controller
{
    public function sendSms(Request $request){
     
        //data listed on array by copy paste
        //uploaded cvs data
        //contact groups data
        // from contacts

        $message = 'Welcome to message center';
        $mobile = "9867182424";
        $api_key = '26131CBCBE0BDF';
        $contacts = $mobile;
        $from = 'SMSBit';
        $routeid = 116;
        $campaign = 5648;
        $sms_text = urlencode($message);
        
        $api_url = "https://login.spellsms.com/base/smsapi/index.php?key=".$api_key."&campaign=".$campaign."&routeid=".$routeid."&type=text&contacts=".$contacts."&senderid=".$from."&msg=".$sms_text;
        
        //Submit to server
        
        $response = file_get_contents( $api_url);
        echo $response;
      
    }
}
