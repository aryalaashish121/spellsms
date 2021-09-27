<?php

namespace App\services;

use App\Models\UserRoute;
use Carbon\Carbon;

class SmsService{
        public function textSMS($contactList,$message){
          
            $contacts = implode(',',$contactList);
            dd($contacts);

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

        public function unicodeSMS($contactList,$message){
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

      public function checkCredit($totalSMS){
          $credits = UserRoute::where('user_id',auth()->user()->id)
          ->where('validity','>=',Carbon::today())      //removing expired credits
          ->where('status',true) 
          ->orderBy('validity','asc')                   //getting in asc order so that we can deduct from the low validatiy date
          ->get();

          $remaing = $credits->sum('balance')-$credits->sum('used');
          if($remaing>=$totalSMS){
            return $remaing;
          }
          return false;
      }

      public function UseCreditsBalance($totalsms){
        // return true;
        $credits = UserRoute::where('user_id',auth()->user()->id)
        ->where('validity','>=',Carbon::today())      //removing expired credits
        ->where('status',true) 
        ->orderBy('validity','asc')                   //getting in asc order so that we can deduct from the low validatiy date
        ->get();
        $credit = UserRoute::where('user_id',auth()->user()->id)
        ->where('validity','>=',Carbon::today())      //removing expired credits
        ->where('status',true) 
        ->orderBy('validity','asc')                   //getting in asc order so that we can deduct from the low validatiy date
        ->first();
        
      
        $remaing_credit = $credits->sum('balance')-$credits->sum('used');
        $update =  UserRoute::where('id',$credit->id)->update([
                        'used'=>$credit->used+$totalsms
        ]);
        return true;

        // for($totalsms;$totalsms!=0;$totalsms){
            
        // }

        // foreach($credits as $credit){
        //     while($totalsms!=0){
        //         $totalsms = ($credit->balance - $credit->used)-$totalsms;
        //         if($totalsms<0){
        //             $totalsms = abs($totalsms);
        //             return $totalsms;
        //         }
        //         //update 
        //         $updateChanges = UserRoute::where('id',$credit->id)->update([
        //             'used'=>$totalsms
        //         ]);
        //     }
        // }

      }
}
