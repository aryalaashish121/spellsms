<?php
namespace App\services;

Class AakashSMSApiService{
    public function textSMS($contactList,$message){
        return "ok comming";
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
