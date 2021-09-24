<?php

namespace App\Http\Controllers\Message;

use App\Components\Core\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Imports\ContactImport;
use App\Models\BlackListContact;
use App\Models\Contact;
use app\Services\AakashSMSApiService;
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

        $pastedList = "";
        $contactGroupList = [];
        $excelNumberList=[];

        if($pasted_numbers){
            $pastedList = preg_split("/\r\n|\n|\r/", $pasted_numbers);
        }
        // dd($request->all());
        if($request->hasFile('excel_numbers')){
            $path1 = $request->file('excel_numbers')->store('temp'); 
            $path=storage_path('app').'/'.$path1;  
                $data = Excel::toArray(new ContactImport,$path);
                foreach($data as $d){
                    foreach($d as $f){
                    array_push($excelNumberList,$f['mobile']);
                    }
            }
        }
        

        if($contact_groups){
            foreach($contact_groups as $group){
                $contacts = Contact::where('contact_group_id',$group['id'])->pluck('mobile');
                $contactGroupList =  $contacts->ToArray();
            }
        }
       $allList =  array_merge($excelNumberList,$pastedList, $contactGroupList,$selected_numbers);


     
        if($request->remove_duplicate){
        $allList = array_unique($allList);
        }

        
        if($request->remove_blacklist){
            $black_listed_contacts = BlackListContact::pluck('mobile');
           $black_listed_contacts= $black_listed_contacts->toArray();
            $allList = (array_diff($allList, $black_listed_contacts));
        }

        //checking phone number validity

        $tags = implode(', ', $allList);
        return $tags;

        $aakashSMSApiService = new AakashSMSApiService();
       $res =  $aakashSMSApiService->textSMS($allList,$message);

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
