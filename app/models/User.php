<?php

class User
{
//    private $db;
    private $api;

    public function __construct()
    {
//        $this->db = new Database();
        $this->api = new API();
    }

    //find user by email
//    public function findUserByEmail($email)
//    {
//        $this->db->query('SELECT * FROM users WHERE email= :email');
//        $this->db->bind('email', $email);
//
//        $row =$this->db->single();
//
//        //Check row
//        if($this->db->rowCount() > 0){
//            return true;
//        }else{
//            return false;
//        }
//    }
    
    //find user by phone
//    public function findUserByPhone($phone)
//    {
//        $this->db->query('SELECT * FROM users WHERE phone= :phone');
//        $this->db->bind('phone', $phone);
//
//        $row =$this->db->single();
//
//        //Check row
//        if($this->db->rowCount() > 0){
//            return true;
//        }else{
//            return false;
//        }
//    }

    public function register($data){
//        var_dump($data);
//        die();
    }

    public function checkUserPhone($phone){
        $this->api->info($phone);
        var_dump($this->api);
        die();
//        return $this->api;
    }

    public function updateUserInfo($phone){

    }

//    public function checkPassword($phone){
//        $this->api->info($phone);
//        var_dump($this->api);
//    }

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

//    public function login($phone, $password)
//    {
//        $this->db->query('SELECT * FROM users WHERE phone= :phone');
//        $this->db->bind('phone', $phone);
//
//        $row =$this->db->single();
//
//        //Password matches
//        $hashed_password = $row->password;
//        if(password_verify($password, $hashed_password)){
//            return $row;
//        }else{
//            return false;
//        }
//    }

    public function sendSms($phone) {
        session_start();
        $user = 'itdep@legion2015.com';
        $password = 'fgtERT587';
        $url = 'https://esputnik.com/api/v1/message/sms';

        $from = 'Pchelka';
        $gen_pass = substr(md5(time()), 0, 4);
        $_SESSION['pass_sms'] = $gen_pass;

        $text = "Ваш новый пароль: $gen_pass";

        $json_value = new stdClass();
        $json_value->text = $text;
        $json_value->from = $from;
        $json_value->phoneNumbers = array($phone);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($json_value));
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json', 'Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_USERPWD, $user.':'.$password);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);
        //echo($output);
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