<?php

class Contact {

    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getContacts($user_id, $filterBy = []){


        $query = 'SELECT * FROM contacts WHERE user_id = :user_id ';
        $bindings = [':user_id' => $user_id];

        if(!empty($filterBy)){

            if($filterBy['group'] !== '0'){
                $query .= 'AND contact_group = :group ';
                $bindings[':group'] = $filterBy['group'];
            }
            if($filterBy['email'] !== 'false'){
                $query .= 'AND email != "" ';
            }
            if($filterBy['phone'] !== 'false'){
                $query .= 'AND phone_number != "" ';
            }

            if($filterBy['search'] !== ''){
                $query .= 'AND name LIKE :search ';
                $bindings[':search'] = '%' . $filterBy['search'] . '%';
            }
        }

        $this->db->query($query);
        foreach ($bindings as $key => $value){
            $this->db->bind($key, $value);
        }

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

    public function findContactByName($name, $id){

        $this->db->query('SELECT * FROM contacts WHERE name = :name AND user_id = :id');
        $this->db->bind(':name', $name);
        $this->db->bind(':id', $id);

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