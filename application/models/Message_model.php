<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Message_model extends CI_Model
{
    function kirimWablas($phone,$msg)
    {
            $link  =  "https://kudus.wablas.com/api/send-message";
            $data = [
            'phone' => $phone,
            'message' => $msg,
            ];
             
             
            $curl = curl_init();
            $token =  "r3VEQ6ftuL4ezBVoxnjIgWH6AQdFcsU2JmXGMSY38WQc9pVvR4WgWvSTSf8uq2Wg";
     
            curl_setopt($curl, CURLOPT_HTTPHEADER,
                array(
                    "Authorization: $token",
                )
            );
            curl_setopt($curl, CURLOPT_URL, $link);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data)); 
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            $result = curl_exec($curl);
            curl_close($curl); 
            return $result;
    }
}