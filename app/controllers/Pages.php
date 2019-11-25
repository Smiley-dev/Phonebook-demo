<?php

class Pages extends Controller {

    public function index(){

        if(isset($_SESSION['user_id'])){
            redirect('/contacts');
        } else {
            $this->view('pages/index');
        }

    }

    public function about(){
        $this->view('pages/about');
    }

}