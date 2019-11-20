<?php

class Contact {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getContacts($user_id){

        $this->db->query('SELECT * FROM contacts WHERE user_id = :user_id ORDER BY name');
        $this->db->bind(':user_id', $user_id);
        return $this->db->resultSet();

    }

    public function addContact($user_id, $name, $email='', $phone = '', $group = '0'){
        $this->db->query('INSERT INTO contacts (user_id, name, email, phone_number, contact_group) VALUES (:user_id, :name, :email, :phone, :group)');
        $this->db->bind(':user_id', $user_id);
        $this->db->bind(':name', $name);
        $this->db->bind(':email', $email);
        $this->db->bind(':phone', $phone);
        $this->db->bind(':group', $group);
        $this->db->execute();
    }

    public function findContactByName($name){

        $this->db->query('SELECT * FROM contacts WHERE name = :name');
        $this->db->bind(':name', $name);

        $row = $this->db->single();

        if(empty($row)){
            return false;
        } else {
            return true;
        }
    }
}