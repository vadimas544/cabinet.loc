<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 16.01.2020
 * Time: 12:00
 * API Base class
 * Connect to API
 */

class API {

    private $user = API_USER;
    private $password = API_PASS;

    public function info($phone){
        $data = [
            'request' => [
                'phone' => $phone,
            ]
        ];

        $data = json_encode($data);


        if(!function_exists('curl_init')) {
            die('cURL not available!');
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, API_URL_INFO);
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//// Send POST request instead of GET and transfer data
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "$this->user:$this->password");

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//// Dont verify SSL certificate (eg. self-signed cert in testsystem)
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $output = curl_exec($curl);

        //Debug
        if ($output === FALSE) {
            echo 'An error has occurred: ' . curl_error($curl) . PHP_EOL;
        }
        else {
            echo $output;
        }

        die();

//        return $output;
    }

    public function update($code_client){

    }

    public function account($code_account){

    }

    public function find($phone){

    }

} 