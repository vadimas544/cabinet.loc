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

    public $url = API_URL;
    public $user = API_USER;
    public $pass = API_PASS;
    public $api;

    public function update(){

    }
    public function info($phone){
        $data = [
            'request' => [
                'phone' => $phone
            ]
        ];

        $data = json_encode($data);
        if(!function_exists('curl_init')) {
            die('cURL not available!');
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "$this->url/info");
        curl_setopt($curl, CURLOPT_FAILONERROR, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//// Send POST request instead of GET and transfer data
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, "$this->user:$this->pass");

        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//// Dont verify SSL certificate (eg. self-signed cert in testsystem)
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        $output = curl_exec($curl);
        if ($output === FALSE) {
            echo 'An error has occurred: ' . curl_error($curl) . PHP_EOL;
        }
        else {
            echo $output;
        }
    }
    public function account(){

    }
} 