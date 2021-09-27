<?php

namespace App\Http\Controllers\Message;

use App\Components\Core\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Imports\ContactImport;
use App\Models\BlackListContact;
use App\Models\Contact;
use App\Models\UserRoute;
use App\services\AakashSMSApiService;
use App\services\SmsService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MessageController extends Controller
{
    use ResponseHelpers;

    public function sendSMS(Request $request, SmsService $smsService){

        $pasted_numbers = $request->pasted_numbers;
        $contact_groups = $request->contact_groups;
        $selected_numbers = $request->selected_numbers;
        $message = $request->message;

        $pastedList = [];
        $contactGroupList = [];
        $excelNumberList=[];

        if($pasted_numbers){
            $pastedList = preg_split("/\r\n|\n|\r/", $pasted_numbers);
        }
        // dd($request->all());
        if($request->hasFile('excel_numbers')){
            $path1 = $request->file('excel_numbers')->getRealPath(); 
            $path=storage_path('app').'/'.$path1;  
            $data = \Maatwebsite\Excel\Excel::import(new ContactImport,$path1);
            // $data = Excel::toArray(new ContactImport,$request->file('excel_numbers'));

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
        return $request->excelNumberList;


       $allList =  array_merge($excelNumberList,$pastedList, $contactGroupList,$selected_numbers);
     
        if($request->remove_duplicate){
        $allList = array_unique($allList);
        }
        if($request->remove_blacklist){
           $black_listed_contacts= BlackListContact::blackListedContacts();
            $allList = (array_diff($allList, $black_listed_contacts));
        }
    
        return $allList;
        //check credit and actions
       if($smsService->checkCredit(count($allList))){
           $usecredit = $smsService->UseCreditsBalance(count($allList));

           return "done with deduting amout";
        $response = $smsService->textSMS($allList,$message);
        return $response;
       };
       return "Low credits";
    }

}
