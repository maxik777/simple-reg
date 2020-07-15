<?php

namespace App\Validation;

class CustomRule
{
    public function check_email(string $email): bool
    {
        $field_value = $email; //this is redundant, but it's to show you how
        //the content of the fields gets automatically passed to the method

        try{
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.debounce.io/v1/?api=5f0ee442467ab&email=".$field_value,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_SSL_VERIFYHOST => 0,
                CURLOPT_SSL_VERIFYPEER => 0,
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);

            curl_close($curl);

        }catch (Exception $e){
            throw new Exception('Something went wrong!');
        }
        $response = json_decode($response);
        $result = $response->debounce->result;

        if($response->success === '1' && $result === 'Safe to Send')
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function recaptcha(string $recaptcha){

        // RECAPTCHA SETTINGS
        $captcha = $recaptcha;
        $ip = $_SERVER['REMOTE_ADDR'];
        $key = '6LeHnLEZAAAAADpqKCXn9ARhBJvoeqsyorH9RWWT';
        $url = 'https://www.google.com/recaptcha/api/siteverify';

        // RECAPTCH RESPONSE
        $recaptcha_response = file_get_contents($url.'?secret='.$key.'&response='.$captcha.'&remoteip='.$ip);
        $data = json_decode($recaptcha_response);

        if(($data->success) &&  $data->success === true){
            return true;
        }else{
            return false;
        }
        //'Your account has been logged as a spammer, you cannot continue!');
    }

}