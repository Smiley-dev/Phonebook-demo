<?php

class Users extends Controller {

    private $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }


    public function login(){
        $this->view('users/login');
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
            } else{
                //Check in database does that email exists
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
                print_r($data['errors']);
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
}