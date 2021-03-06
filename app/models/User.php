<?php

class User
{
    private $api;

    public function __construct()
    {
        $this->api = new API();
    }

    public function register($data){


        //redirect('users/sms');
    }

    public function sendSms($phone){
        echo 2;
        sendSms($phone);
        echo 1;
        //redirect('users/sms');

    }

    public function checkSmsCode($code){
        if($code == $_SESSION['sms_pass']){
            //echo 2;
            //die();
            return true;
        }
    }

    public function checkPhone($phone){
        $res = $this->api->info($phone);
        $response = json_decode($res, true);

        $code_client = $response['response']['client']['code_client'];

        return $code_client;


//        print_r('<pre>');
//        var_dump($code_client);
//        print_r('</pre>');
        //die();
    }

    public function update($code_client, $phone, $password){
        $this->api->update($code_client, $phone, $password);
        //var_dump($this->api);
    }

    public function getPassword($phone)
    {
        $res = $this->api->info($phone);
        $response = json_decode($res, true);

        $password = $response['response']['client']['password'];

        return $password;
    }

    public function cabinetInfo($code_client){
        $info = $this->api->cabinetInfo($code_client);
        $response = json_decode($info, true);
        return $response;
    }

    //Register user
//    public function register($data)
//    {
//        $this->db->query('INSERT INTO users (phone, name, surname, patronymic, birthday, email, password) VALUES(:phone, :name, :surname,:patronymic, :birthday,  :email, :password)');
//        //Bind values
//        $this->db->bind(':phone', $data['phone']);
//        $this->db->bind(':name', $data['name']);
//        $this->db->bind(':surname', $data['surname']);
//        $this->db->bind(':patronymic', $data['patronymic']);
//        $this->db->bind(':birthday', $data['birthday']);
//        $this->db->bind(':email', $data['email']);
//        $this->db->bind(':password', $data['password']);
//
//        //Execute
//        if($this->db->execute()){
//            return true;
//        }else{
//            return false;
//        }
//    }

    //Login User

    public function login($phone, $password)
    {

        $code_client = $this->checkPhone($phone);

        $hashed_password = $this->getPassword($phone);


        $info = $this->api->info($phone);

        $info = json_decode($info, true);


        //Password matches
        if(password_verify($password, $hashed_password)){
            return $code_client;
        }else{
            return false;
        }
    }


//    public function sms($phone){
//
//        //Check for POST
//        if($_SERVER['REQUEST_METHOD'] == 'POST'){
//            //Process Form
//
//            send_sms($phone);
//
//        }else {
//            //Init data
//            $data = [
//                'password' => '',
//                'password_error' => '',
//            ];
//
//
//            //Load view
//            $this->view('users/sms', $data);
//        }
//    }
}