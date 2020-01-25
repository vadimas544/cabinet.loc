<?php


class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    public function index(){

    }
    public function register()
    {
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Process form

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'phone' => trim($_POST['phone']),
                'name' => trim($_POST['name']),
                'surname' => trim($_POST['surname']),
                'patronymic' => trim($_POST['patronymic']),
                'birthday' => trim($_POST['birthday']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'phone_error' => '',
                'name_error' => '',
                'surname_error' => '',
                'patronymic_error' => '',
                'birthday_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            //Validate phone
            if(empty($data['phone'])){
                $data['phone_error'] = 'Пожалуйста введите телефон!';
            } else{
                //Check phone in DB
                if($this->userModel->findUserByPhone($data['phone'])){
                    $data['phone_error'] = 'Такой номер уже используется!';
                }
            }
            
            //Validate email
            if(empty($data['email'])){
                $data['email_error'] = 'Пожалуйста введите email!';
            } else{
                //Check email in DB
                if($this->userModel->findUserByEmail($data['email'])){
                    $data['email_error'] = 'Такой email уже используется!';
                }
            }

            //Validate Name
            if(empty($data['name'])){
                $data['name_error'] = 'Пожалуйста введите имя!';
            }
            
            //Validate Surname
            if(empty($data['surname'])){
                $data['surname_error'] = 'Пожалуйста введите фамилию!';
            }
            
            //Validate Patronymic
            if(empty($data['patronymic'])){
                $data['patronymic_error'] = 'Пожалуйста введите отчество!';
            }
            
            //Validate Birthday
            if(empty($data['birthday'])){
                $data['birthday_error'] = 'Пожалуйста введите дату рождения!';
            }

            //Validate Password
            if(empty($data['password'])){
                $data['password_error'] = 'Пожалуйста введите пароль!';
            }elseif (strlen($data['password']) < 8){
                $data['password_error'] = 'Пароль должен быть больше 8 символов!';
            }

            //Validate confirm password
            if(empty($data['confirm_password'])){
                $data['confirm_password_error'] = 'Пожалуйста подтвердите пароль!';
            } else{
                if($data['password'] != $data['confirm_password']){
                    $data['confirm_password_error'] = 'Пароли не совпадают!';
                }
            }

            //Make sure errors are empty

            if(empty($data['phone_error']) && empty($data['name_error']) && empty($data['surname_error']) && empty($data['patronymic_error']) && empty($data['birthday_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])){

                //Validated

                //Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register User
                if( $this->userModel->register($data) ){
                    sendSms($data['phone']);
                    flash('register_success', 'Вы успешно зарегистрировались и можете войти!');
                    redirect('users/sms');

                }else{
                    die('Что-то пошло не так...');
                }



            }else{
                $this->view('users/register', $data);
            }

        }else{
            //Init data
            $data = [
                'phone' => '',
                'name' => '',
                'surname' => '',
                'patronymic' => '',
                'birthday' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'phone_error',
                'name_error' => '',
                'surname_error' => '',
                'patronymic_error' => '',
                'birthday_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => ''
            ];

            //Load view
            $this->view('users/register', $data);
        }
    }

    public function login()
    {
        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //Process form

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'phone' => trim($_POST['phone']),
//                'password' => trim($_POST['password']),
                'phone_error' => '',
//                'password_error' => '',
            ];

              //Validate phone
            if(empty($data['phone'])){
                $data['phone_error'] = 'Пожалуйста введите номер телефона!';
            }

            //Check for user phone
            if($this->userModel->findUserByPhone($data['phone'])){
                //User found
            }else{
                $data['phone_error'] = 'Пользователя с таким номером не найдено';
            }

            //Validate Password
//            if(empty($data['password'])){
//                $data['password_error'] = 'Пожалуйста введите пароль!';
//            }

            //Check that password is not empty
//            if($this->userModel->checkPassword($data['phone'])){
//                //Password is be
//            }else{
//                $data['password_error'] = 'Такого пользователя нет. Нужно пройти процедуру регистрации!';
//            }

            //Make sure errors are empty

//            if(empty($data['phone_error']) && empty($data['password_error'])){
//                //Validated
//                //Check and set logged in user
//
//                $loggedInUser = $this->userModel->login($data['phone'], $data['password']);
//
//                if($loggedInUser){
//                    //Create Session
//                    $this->createUserSession($loggedInUser);
//
//                }else{
//                    $data['password_error'] = 'Пароль неверный!';
//                    $this->view('users/login', $data);
//                }
//
//            }else{
//                $this->view('users/login', $data);
//            }

        }else{
            //Init data
            $data = [
                'phone' => '',
//                'password' => '',
                'phone_error' => '',
//                'password_error' => '',
            ];



            //Load view
            $this->view('users/login', $data);
        }
    }

    public function recovery(){

            //Load view
            $this->view('users/recovery');
    }

    public function sms(){

        //Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //Process Form

        }else {
            //Init data
            $data = [
                'password' => '',
                'password_error' => '',
            ];


            //Load view
            $this->view('users/sms', $data);
        }
    }


    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_phone'] = $user->phone;

        redirect('pages/index');

    }

    public function cabinet(){



        $this->view('users/cabinet');
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_phone']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn()
    {
        if(isset($_SESSION['user_id'])){
            return true;
        }else{
            return false;
        }
    }
}