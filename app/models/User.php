<?php

class User {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function registerUser($data){
        $this->db->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');

        //Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);

        //Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }

    public function findUserByEmail($email){

        $this->db->query('SELECT * FROM users WHERE email = :email');

        $this->db->bind(':email', $email);

        $row = $this->db->single();

        if($this->db->rowCount() > 0){
            return true;
        } else {
            return false;
        }

    }

    public function findUserById($id){
        $this->db->query('SELECT * FROM users WHERE user_id = :user_id');
        $this->db->bind(':user_id', $id);

        $row = $this->db->single();

        return $row;

    }

    public function login($email, $password){
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);

        $row = $this->db->single();
        $hashed_password = $row->password;

        if(password_verify($password, $hashed_password)){
            return $row;
        } else {
            return false;
        }
    }
}