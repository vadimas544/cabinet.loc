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

    public function checkPassword($phone){
        $this->api->info($phone);
        var_dump($this->api);
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
}