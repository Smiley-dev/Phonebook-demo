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

    public function editContact($data){
        $this->db->query('UPDATE contacts SET name = :name, email = :email, phone_number = :phone_number, contact_group = :contact_group WHERE contact_id = :id');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':phone_number', $data['phone_number']);
        $this->db->bind(':contact_group', $data['group']);
        $this->db->bind(':id', $data['id']);

        $this->db->execute();
    }

    public function deleteContact($id){
        $this->db->query('DELETE FROM contacts WHERE contact_id = :id');

        $this->db->bind(':id', $id);

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

    public function findContactById($id){
        $this->db->query('SELECT * FROM contacts WHERE contact_id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        if(empty($row)){
            return false;
        } else {
            return $row;
        }
    }
}