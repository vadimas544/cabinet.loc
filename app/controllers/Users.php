<?php


class Users extends Controller
{
    public function __construct()
    {
        $this->userModel = $this->model('User');
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
                    flash('register_success', 'Вы успешно зарегистрировались и можете войти!');
                    redirect('users/login');

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
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_error' => '',
                'password_error' => '',
            ];

            //Validate email
            if(empty($data['email'])){
                $data['email_error'] = 'Please enter email!';
            }

            //Check for user email
            if($this->userModel->findUserByEmail($data['email'])){
                //User found
            }else{
                $data['email_error'] = 'No user found';
            }

            //Validate Password
            if(empty($data['password'])){
                $data['password_error'] = 'Please enter password!';
            }

            //Make sure errors are empty

            if(empty($data['email_error']) && empty($data['password_error'])){
                //Validated
                //Check and set logged in user

                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser){
                    //Create Session
                    $this->createUserSession($loggedInUser);

                }else{
                    $data['password_error'] = 'Password incorrect';
                    $this->view('users/login', $data);
                }

            }else{
                $this->view('users/login', $data);
            }

        }else{
            //Init data
            $data = [
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => '',
            ];



            //Load view
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        $_SESSION['user_email'] = $user->email;

        redirect('pages/index');

    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
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