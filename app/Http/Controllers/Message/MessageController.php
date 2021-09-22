<?php

namespace App\Http\Controllers\Message;

use App\Components\Core\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Imports\ContactImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MessageController extends Controller
{
    use ResponseHelpers;
    public function sendSMS(Request $request){

        $pasted_numbers = $request->pasted_numbers;
        $contact_groups = $request->contact_groups;
        $selected_numbers = $request->selected_numbers;
        $message = $request->message;

        $pastedList = preg_split("/\r\n|\n|\r/", $pasted_numbers);

        $excelNumberList = [];
            // $data = Excel::toArray(new ContactImport,$request->file('excel_numbers'));
            // foreach($data as $d){
            //     foreach($d as $f){
            //     array_push($excelNumberList,$f['mobile']);
            //     }
            // }


        $allList =  array_merge($excelNumberList,$pastedList);
        $removing_duplicate = array_unique($allList);

        $print['allList']=$allList;
        $print['removing_duplicate'] = $removing_duplicate;

        $tags = implode(', ', $allList);

       $res =  $this->aakashSms($removing_duplicate,$message);

       return $res;
    //    if($res['error']=="false"){
    //         return $this->respondSuccess($res['message'],$res['data']);
    //    }else{
    //     return $this->respondError($res['message'],$res['data']);

    //    }
      
    }

    public function aakashSms($contactList,$message){

        $contacts = implode(',',$contactList);
        $args = http_build_query(array(
            'auth_token'=> '24e37a4f557a608b2d05431670f25d75b464dea735d08297c7eb4ca26b5afbc8',
            'to'    =>  $contacts,
            'text'  => $message
        ));
    $url = "https://sms.aakashsms.com/sms/v3/send/";

    # Make the call using API.
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1); ///
    curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
    // Response
    $response = curl_exec($ch);
    curl_close($ch);     
       
       return $response;
    }
}
