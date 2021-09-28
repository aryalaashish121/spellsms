<?php

namespace App\Http\Controllers\Message;

use App\Components\Core\ResponseHelpers;
use App\Http\Controllers\Controller;
use App\Imports\ContactImport;
use App\Jobs\CheckJob;
use App\Models\BlackListContact;
use App\Models\Contact;
use App\Models\UserRoute;
use App\services\AakashSMSApiService;
use App\services\SmsService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use SebastianBergmann\Environment\Console;

class MessageController extends Controller
{
    use ResponseHelpers;

    public function sendSMS(Request $request, SmsService $smsService){

        $pasted_numbers = $request->pasted_numbers;
        $contact_groups = $request->contact_groups;
        $selected_numbers = $request->selected_numbers;
        $message = $request->message;

        // dd($request->all());
        $allList=[];
        $pastedList = [];
        $contactGroupList = [];
        $excelNumberList=[];
        $selectedNumberList = [];

        if($pasted_numbers){
            $pastedList = preg_split("/\r\n|\n|\r/", $pasted_numbers);
            $allList =  array_merge($allList,$pastedList);

        }
        if($selected_numbers){
            $selectedNumberList = explode(",",$selected_numbers);
            $allList =  array_merge($allList,$selectedNumberList);
        }
        // dd($request->all());
        if($request->hasFile('excel_numbers')){
            $data = Excel::toArray(new ContactImport,$request->file('excel_numbers'));
                foreach($data as $d){
                    foreach($d as $f){
                    array_push($excelNumberList,$f['mobile']);
                    }
            }
           
            $allList =  array_merge($allList,$excelNumberList);
        }
        
        if($contact_groups){
            $data = explode(",",$contact_groups);
            foreach($data as $group){
               $contacts = Contact::where('contact_group_id',$group)->pluck('mobile')->values();
               array_push($contactGroupList,$contacts[0]);
            }
            $allList =  array_merge($allList,$contactGroupList);
        }    

        // $response = $smsService->textSMS($allList,$message);
    
        if($request->remove_duplicate){
        $allList = array_unique($allList);
        }
        // dd($request->all());
        if($request->remove_blacklist){
           $black_listed_contacts= BlackListContact::blackListedContacts();
            $allList = (array_diff($allList, $black_listed_contacts));
        }
        // return $allList;
        //check credit and actions
       if($smsService->checkCredit(count($allList))){
           $usecredit = $smsService->UseCreditsBalance(count($allList));

        //    return "done with deduting amout";
        $response = $smsService->textSMS($allList,$message);
        return $response;
       };
       return "Low credits";
    }

}
