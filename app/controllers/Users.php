<?php

class Users extends Controller {

    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }



    public function register(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            //Sanitize POST data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Data
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'confirm_password' => $_POST['confirm_password'],
                'errors' => [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => ''
                ]
            ];

            /*
             * VALIDATIONS
            */

            //Validate name
            if(empty($data['name'])){
                $data['errors']['name'] = 'Please enter your name';
            } elseif(strlen($data['name']) < 2) {
                $data['errors']['name'] = 'Name must be at least 2 characters long';
            }

            //Validate email
            if(empty($data['email'])){
                $data['errors']['email'] = 'Please enter your email';
            } elseif($this->userModel->findUserByEmail($data['email'])){
                $data['errors']['email'] = 'User with that email has already been registred';
            }

            //Validate password
            if(empty($data['password'])){
                $data['errors']['password'] = 'Please enter password';
            } elseif(strlen($data['password']) < 6){
                $data['errors']['password'] = 'Password must be at least 6 characters long';
            }

            //Validate confirm password
            if(empty($data['confirm_password'])){
                $data['errors']['confirm_password'] = 'Please confirm password';
            } elseif ($data['password'] !== $data['confirm_password']){
                $data['errors']['confirm_password'] = 'Passwords must match';
            }


            //Make sure that the errors are empty
            if(empty($data['errors']['name']) && empty($data['errors']['email']) && empty($data['errors']['password']) && empty($data['errors']['confirm_password'])){

                //Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

                //Register user
                if($this->userModel->registerUser($data)){
                    //Redirect to login page
                    redirect('/users/login');
                } else {
                    die('Something went wrong');
                }
            } else {
                //Load views with errors
                $this->view('/users/register', $data);

            }
        } else {

            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'errors' => [
                    'name' => '',
                    'email' => '',
                    'password' => '',
                    'confirm_password' => ''
                ]
            ];

            $this->view('/users/register', $data);
        }
    }

    public function login(){

        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            //Data
            $data = [
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'errors' => [
                    'email' => '',
                    'password' => ''
                ]
            ];

            //Validate email
            if(empty($data['email'])){
                $data['errors']['email'] = 'Please enter your email';
            } elseif (!$this->userModel->findUserByEmail($data['email'])){
                $data['errors']['email'] = 'User with that email does not exist';
            }

            //Validate password
            if(empty($data['password'])){
                $data['errors']['password'] = 'Please enter your password';
            }

            //Check if errors are empty
            if(empty($data['errors']['email']) && empty($data['errors']['password'])){

                $loggedInUser = $this->userModel->login($data['email'], $data['password']);

                if($loggedInUser){

                    //Create user session
                    $this->createUserSession($loggedInUser);
                } else {

                    //incorrect password
                    $data['errors']['password'] = 'Incorrect password';

                    $this->view('users/login', $data);
                }

            } else {

                $this->view('users/login', $data);

            }
        } else {

            $data = [
                'email' => '',
                'password' => '',
                'errors' => [
                    'email' => '',
                    'password' => ''
                ]
            ];

            $this->view('users/login', $data);

        }

    }





    public function createUserSession($user){

        $_SESSION['user_id'] = $user->user_id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;

        redirect('/contacts');
    }

    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);

        session_destroy();
        redirect('/users/login');
    }
}